<?php

namespace MystahCraft\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MystahCraft\SiteBundle\Entity\Rules;
use MystahCraft\SiteBundle\Form\RulesType;

class AjouterController extends Controller
{    
    public function rulesAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$rule = new Rules();
    	
    	$form = $this->createForm(new RulesType(), $rule);
    	
    	$request = $this->getRequest();
    	
    	if($request->isMethod('POST'))
    	{
    		$form->bind($request);
    		
    		if($form->isValid())
    		{
    			$em->persist($rule);
    			$em->flush();
    			
    			return $this->redirect($this->generateUrl('admin_rules'));
    		}
    	}
    	
    	return $this->render('MystahCraftAdminBundle:Ajouter:rule.html.twig', array(
    		'form' => $form->createView()
    	));
    }
}
