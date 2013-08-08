<?php

namespace MystahCraft\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MystahCraft\SiteBundle\Entity\Contenus;

class VoirController extends Controller
{
    public function indexAction()
    {
        return $this->render('MystahCraftAdminBundle:Voir:index.html.twig');
    }
    
    public function rulesAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$rules = $em->getRepository("MystahCraftSiteBundle:Contenus")->findAll();
    	
    	return $this->render('MystahCraftAdminBundle:Voir:rules.html.twig', array(
    		'rules' => $rules
    	));
    }
    
    public function ruleAction(Contenus $rule)
    {
    	return $this->render("MystahCraftAdminBundle:Voir:rule.html.twig", array(
    		'rule' => $rule
    	));
    }
}
