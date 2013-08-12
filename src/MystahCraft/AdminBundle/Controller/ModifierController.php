<?php

namespace MystahCraft\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Monolog\Logger;
use MystahCraft\SiteBundle\Entity\Contenus;
use MystahCraft\SiteBundle\Form\ContenusType;
use MystahCraft\SiteBundle\Entity\TypesContenus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ModifierController extends Controller
{    
	/**
	 * 
	 * @param TypesContenus $typeContenu
	 * @param Contenus $rule
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 */
    public function contenusAction(TypesContenus $typeContenu, Contenus $rule)
    {	
    	$em = $this->getDoctrine()->getManager();
    	$form = $this->createForm(new ContenusType(), $rule);
    	
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
    			
    			return $this->redirect($this->generateUrl('admin_rules', array('type' => $typeContenu->getType())));
    		}
    	}
    	
    	return $this->render('MystahCraftAdminBundle:Modifier:contenu.html.twig', array(
    		'type' => $typeContenu->getType(),
    		'form' => $form->createView(),
    		'rule' => $rule
    	));
    }
}
