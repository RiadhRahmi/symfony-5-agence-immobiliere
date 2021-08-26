<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
    public function index(): Response
    {

       // return new Response('Hello world');
        return $this->render('hello/index.html.twig', [
            'number' => 30,
        ]);
    }


    /**
     * @Route("/show" , name="show" , methods={"GET"})
     */
    public function show()
    {
        return new Response('show'  , Response::HTTP_OK);
    }

    /**
     * @Route(
     *     "/contact",
     *     name="contact",
     *     condition="context.getMethod() in ['GET', 'HEAD'] and request.headers.get('User-Agent') matches '/firefox/i'"
     * )
     *
     * expressions can also include configuration parameters:
     * condition: "request.headers.get('User-Agent') matches '%app.allowed_browsers%'"
     */
    public function contact(): Response
    {
        return new Response('CONTACT');
    }


    /**
     * @Route("/blog/{slug}", name="blog_show" , requirements={"slug"="\d+"})
     */
    public function blog(string $slug): Response
    {
        return new Response('blog '.$slug);
    }
}
