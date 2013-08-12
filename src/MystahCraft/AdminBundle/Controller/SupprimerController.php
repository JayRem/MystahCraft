<?php

namespace MystahCraft\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MystahCraft\SiteBundle\Entity\Contenus;
use MystahCraft\SiteBundle\Entity\TypesContenus;

class SupprimerController extends Controller
{
    
    public function contenuAction(TypesContenus $type, Contenus $rule)
    {
    	$this->render('MystahCraftAdminBundle:Supprimer:contenu.html.twig', array(
    		'rule' => $rule
    	));
    }
}
