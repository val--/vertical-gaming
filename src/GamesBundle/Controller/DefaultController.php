<?php

namespace GamesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GamesBundle\Entity\Game;
use GamesBundle\Entity\Type;
use GamesBundle\Entity\Platform;
use GamesBundle\Entity\Screenshot;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$categories = $em->getRepository('GamesBundle:Type')->findAll();
    	$games = $em->getRepository('GamesBundle:Game')->findAll();
    	
        return $this->render('GamesBundle:Default:index.html.twig', array("categories" => $categories, "games" => $games));
    }
}
