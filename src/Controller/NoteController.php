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
        $board = $this->getDoctrine()
                      ->getRepository(Board::class)
                      ->findOneByCode($request->request->get('bid'));

        $response = new Response;
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
    public function read(Request $request)
    {
        echo 'read';
    }

    /**
     * @Route("/note", name="note_read", methods={"DELETE"})
     */
    public function delete(Request $request)
    {
        echo 'read';
    }
}
