<?php
// src/Controller/DefaultController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\Board;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="default")
     */
    public function default(Request $request)
    {
        $bid = $request->query->get('bid', null);


        $board = $bid
            ? $this->getDoctrine()
                   ->getRepository(Board::class)
                   ->findOneByCode($bid)
            : null;

        if (!$bid || !$board) {
            $board = $this->getDoctrine()
                          ->getRepository(Board::class)
                          ->create();
            return $this->redirectToRoute('default', ['bid' => $board->getCode()]);
        }

        return $this->render('base.html.twig');
    }
}
