<?php

namespace MystahCraft\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MystahCraft\SiteBundle\Entity\Contenus;
use MystahCraft\SiteBundle\Form\ContenusType;
use MystahCraft\SiteBundle\Entity\TypesContenus;

class AjouterController extends Controller
{    
    public function contenusAction(TypesContenus $type)
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$contenu = new Contenus();
    	$contenu->setType($type);
    	
    	$form = $this->createForm(new ContenusType(), $contenu);
    	
    	$request = $this->getRequest();
    	
    	if($request->isMethod('POST'))
    	{
    		$form->bind($request);
    		
    		if($form->isValid())
    		{
    			$em->persist($contenu);
    			$em->flush();
    			
    			return $this->redirect($this->generateUrl('admin_rules'));
    		}
    	}
    	
    	return $this->render('MystahCraftAdminBundle:Ajouter:contenu.html.twig', array(
    		'form' => $form->createView()
    	));
    }
}
