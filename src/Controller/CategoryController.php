<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categories;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index()
    {
        $categories = $this->getDoctrine()
            ->getRepository(Categories::class)
            ->findAll();


        return $this->render('category/index.html.twig', [
            'controller_name' => 'Categories',
            'categories' => $categories,
        ]);
    }
}
