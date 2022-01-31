<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post/{id}", name="post")
     */

    public function index(int $id): Response
    {
        $pathfile = "../public/blog.json";
        $jsonFile = file_get_contents($pathfile);
        $jsonContent = json_decode($jsonFile, true);
        $posts = reset($jsonContent);

        $post = $posts[$id];
        return $this->render('post/index.html.twig', [
            'post' => $post,
        ]);
    }
}
