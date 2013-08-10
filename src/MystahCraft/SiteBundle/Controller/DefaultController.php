<?php

namespace MystahCraft\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$typeIp = $em->getRepository('MystahCraftSiteBundle:TypesContenus')->findOneByType('ip-serveur');
    	$typeHeaderRules = $em->getRepository('MystahCraftSiteBundle:TypesContenus')->findOneByType('entete-regle');
    	$typeRules = $em->getRepository('MystahCraftSiteBundle:TypesContenus')->findOneByType('regle');
    	$typeFooterRules = $em->getRepository('MystahCraftSiteBundle:TypesContenus')->findOneByType('pied-regle');
    	$typeSignRules = $em->getRepository('MystahCraftSiteBundle:TypesContenus')->findOneByType('signature-regle');
    	
    	$ip = $typeIp->getContenus();
    	$headerRules = $typeHeaderRules->getContenus();
    	$rules = $typeRules->getContenus();
    	$footerRules = $typeFooterRules->getContenus();
    	$signRules = $typeSignRules->getContenus();
    	
//     	var_dump($typeIp);
    	
//     	var_dump($ip->toArray());
//     	var_dump($headerRules->toArray());
//     	var_dump($rules->toArray());
//     	var_dump($footerRules->toArray());
//     	var_dump($signRules->toArray());
    	
    	//throw $this->createNotFoundException('Ceci est mon erreur !');
    	
        return $this->render('MystahCraftSiteBundle:Default:index.html.twig', array(
        	'rules' => $rules,
        	'ip' => $ip->get(0)->getValeur(),
        	'header_rules' => $headerRules->get(0)->getValeur(),
        	'footer_rules' => $footerRules->get(0)->getValeur(),
        	'sign_rules' => $signRules->get(0)->getValeur()
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
