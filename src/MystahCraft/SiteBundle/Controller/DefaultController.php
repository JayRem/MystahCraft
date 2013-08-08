<?php

namespace MystahCraft\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$rules = $em->getRepository('MystahCraftSiteBundle:Contenus')->findAll();
    	
        return $this->render('MystahCraftSiteBundle:Default:index.html.twig', array(
        	'rules' => $rules
        ));
    }

    public function joueursAction()
    {

    	return $this->render('MystahCraftSiteBundle:Default:joueurs.html.twig');
    }
    
    public function histoireAction()
    {

    	return $this->render('MystahCraftSiteBundle:Default:histoire.html.twig');
    }

    public function screenAction()
    {

    	return $this->render('MystahCraftSiteBundle:Default:screen.html.twig');
    }

    public function liensAction()
    {

    	return $this->render('MystahCraftSiteBundle:Default:liens.html.twig');
    }
}
