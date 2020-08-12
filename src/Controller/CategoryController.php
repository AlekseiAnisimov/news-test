<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class CategoryController
{
    public function index()
    {
        return new Response('Test');
    }
}