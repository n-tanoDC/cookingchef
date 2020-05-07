<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="Homepage")
     */
    public function index()
    {
        $em = $this->getDoctrine();

        $recipes = $em->getRepository(Recipe::class)->findAll();

        return $this->render('default/index.html.twig', [
            "recipes" => $recipes
        ]);
    }

    /**
     * @Route("/search", name="Search")
     * @param Request $request
     * @return Response
     */

    public function search(Request $request)
    {
        $em = $this->getDoctrine();
        $categoryId = $request->query->get("category");

        $recipes = $em->getRepository(Recipe::class)->findBy(["category" => $categoryId]);
        $category = $em->getRepository(Category::class)->findOneBy(["id" => $categoryId]);

        return $this->render('default/index.html.twig', [
            "recipes" => $recipes,
            "category" => $category
        ]);
    }
}
