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
    	$headerRules = $typeIp->getContenus();
    	$rules = $typeIp->getContenus();
    	$footerRules = $typeIp->getContenus();
    	$signRules = $typeIp->getContenus();
    	var_dump($ip);
    	var_dump($headerRules);
    	var_dump($rules);
    	var_dump($footerRules);
    	var_dump($signRules);
    	
        return $this->render('MystahCraftSiteBundle:Default:index.html.twig', array(
        	'rules' => $rules,
        	'ip' => $ip[0]->getValeur(),
        	'header-rules' => $headerRules[0]->getValeur(),
        	'footer-rules' => $footerRules[0]->getValeur(),
        	'sign-rules' => $signRules[0]->getValeur()
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
