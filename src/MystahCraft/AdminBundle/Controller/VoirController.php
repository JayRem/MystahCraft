<?php

namespace MystahCraft\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MystahCraft\SiteBundle\Entity\Rules;
use MystahCraft\SiteBundle\Form\RulesType;

class VoirController extends Controller
{
    public function indexAction()
    {
        return $this->render('MystahCraftAdminBundle:Voir:index.html.twig');
    }
    
    public function rulesAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$rules = $em->getRepository("MystahCraftSiteBundle:Rules")->findAll();
    	
    	return $this->render('MystahCraftAdminBundle:Voir:rules.html.twig', array(
    		'rules' => $rules
    	));
    }
    
    public function ruleAction(Rules $rule)
    {
    	return $this->render("MystahCraftAdminBundle:Voir:rule.html.twig", array(
    		'rule' => $rule
    	));
    }
}
