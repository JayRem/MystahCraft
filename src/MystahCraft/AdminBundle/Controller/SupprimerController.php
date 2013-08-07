<?php

namespace MystahCraft\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MystahCraft\SiteBundle\Entity\Rules;
use MystahCraft\SiteBundle\Form\RulesType;

class SupprimerController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MystahCraftAdminBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function ruleAction(Rules $rule)
    {
    	$this->render('MystahCraftAdminBundle:Supprimer:rule.html.twig', array(
    		'rule' => $rule
    	));
    }
}
