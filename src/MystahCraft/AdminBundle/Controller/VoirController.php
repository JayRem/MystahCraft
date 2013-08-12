<?php

namespace MystahCraft\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MystahCraft\SiteBundle\Entity\Contenus;
use MystahCraft\SiteBundle\Entity\TypesContenus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class VoirController extends Controller
{
    public function indexAction()
    {
        return $this->render('MystahCraftAdminBundle:Voir:index.html.twig');
    }
    
    /**
     * 
     * @param TypesContenus $type
     * @ParamConverter("type")
     */
    public function contenusAction(TypesContenus $typeContenu)
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$contenus = $em->getRepository("MystahCraftSiteBundle:Contenus")->findByType($typeContenu);
    	
    	return $this->render('MystahCraftAdminBundle:Voir:contenus.html.twig', array(
    		'type' => $typeContenu->getType(),
    		'contenus' => $contenus
    	));
    }
    
    public function contenuAction(TypesContenus $typeContenu, Contenus $contenu)
    {
    	return $this->render("MystahCraftAdminBundle:Voir:contenu.html.twig", array(
    		'type' => $typeContenu->getType(),
    		'contenu' => $contenu
    	));
    }
}
