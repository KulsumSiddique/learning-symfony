<?php

// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
     /**
     * @Route("/", name="app_homepage")
     */

    public function homepage()
    {
        return $this->render('blog/homepage.html.twig');
    }
    
    /**
     * @Route("/blog/{slug}", name="blog_show")
     */


    public function show($slug)
    {
        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];
        dump($slug, $this);
        return $this->render('blog/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'slug' => $slug,
            'comments' => $comments,
        ]);
    }

    /**
     * @Route("/blog/{slug}/heart", name="blog_toggle_heart", methods={"POST"})
     */

    public function toggleArticleHeart($slug)
    {
        // TODO - actually heart/unheart the article!
        return new JsonResponse(['hearts' => rand(5, 100)]);
    }

}