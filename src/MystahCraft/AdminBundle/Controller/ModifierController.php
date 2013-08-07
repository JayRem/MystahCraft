<?php

namespace MystahCraft\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MystahCraft\SiteBundle\Entity\Rules;
use MystahCraft\SiteBundle\Form\RulesType;
use Monolog\Logger;

class ModifierController extends Controller
{    
    public function rulesAction(Rules $rule)
    {	
    	$em = $this->getDoctrine()->getManager();
    	$form = $this->createForm(new RulesType(), $rule);
    	
    	$request = $this->getRequest();
    	
    	if($request->isMethod('POST'))
    	{
    		$log = $this->get('logger');
    		$log->addInfo('Rules POST');
    		$form->bind($request);

    		$log->addInfo('Rules Binded');
    		if($form->isValid())
    		{
    			$em->persist($rule);
    			$log->addInfo('Rules Valid');
    			$em->flush();
    		$log->addInfo('Rules Flushed');
    			
    			return $this->redirect($this->generateUrl('admin_rules'));
    		}
    	}
    	
    	return $this->render('MystahCraftAdminBundle:Modifier:rule.html.twig', array(
    		'form' => $form->createView(),
    		'rule' => $rule
    	));
    }
}
