<?php
// src/Controller/DefaultController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\Board;
use App\Entity\Note;

class NoteController extends AbstractController
{
    /**
     * @Route("/note", name="note_create", methods={"POST"})
     */
    public function create(Request $request)
    {
        $response = new Response;

        $params = json_decode($request->getContent(), true);
        if (!isset($params['bid'])) {
            return $response->setStatusCode(Response::HTTP_BAD_REQUEST);
        }

        $board = $this->getDoctrine()
                      ->getRepository(Board::class)
                      ->findOneByCode($params['bid']);

        if (!$board) {
            return $response->setStatusCode(Response::HTTP_NOT_FOUND);
        }

        $note = $this->getDoctrine()
                     ->getRepository(Note::class)
                     ->create($board);

        return $response->setContent(json_encode($note->readAsArray()));
    }

    /**
     * @Route("/note", name="note_read", methods={"GET"})
     */
    public function index(Request $request)
    {
        $response = new Response;

        $bid = $request->query->get('bid');
        if (!$bid) {
            return $response->setStatusCode(Response::HTTP_BAD_REQUEST);
        }

        $board = $this->getDoctrine()
                      ->getRepository(Board::class)
                      ->findOneByCode($bid);

        if (!$board) {
            return $response->setStatusCode(Response::HTTP_NOT_FOUND);
        }

        $notes = $board->getNote()->map(function($noteEntity) {
            return $noteEntity->readAsArray();
        })->toArray();

        return $response->setContent(json_encode($notes));
    }

    /**
     * @Route("/note", name="note_delete", methods={"DELETE"})
     */
    public function delete(Request $request)
    {
        echo 'read';
    }
}
