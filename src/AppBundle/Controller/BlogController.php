<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 05/11/2016
 * Time: 12:55
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    /**
     * @Route("/home/{var}")
     */
    public function showAction($var){

        $funfact = 'Octopuses can change the color of their body in just *three-tenths* of a second!';
        $funfact = $this->get('markdown.parser')->transform($funfact);
        $notes = [
            'Ceci est tres beau',
            'Ceci est tres mal',
            'Ceci est tres cool'
        ];
        return $this->render('blog/blog.html.twig', ['name' => $var, 'notes' => $notes, 'funfact' => $funfact]);
    }

    /**
     * @Route("/home/{var}/data",name="blog_show_comments")
     * @return JsonResponse
     */
    public function dataAction(){

        $notes = [
            ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Octopus asked me a riddle, outsmarted me', 'date' => 'Dec. 10, 2015'],
            ['id' => 2, 'username' => 'AquaWeaver', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'I counted 8 legs... as they wrapped around me', 'date' => 'Dec. 1, 2015'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Inked!', 'date' => 'Aug. 20, 2015'],
        ];

        $data = [
            'notes' => $notes,
        ];

        return new JsonResponse($data);
    }
}