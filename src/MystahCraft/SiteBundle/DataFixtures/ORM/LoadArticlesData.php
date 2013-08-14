<?php
namespace MystahCraft\SiteBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MystahCraft\SiteBundle\Entity\Articles;
use MystahCraft\SiteBundle\Entity\Thread;


class LoadArticlesData implements FixtureInterface{
	
	
	public function load(ObjectManager $manager) {
		$articles = array();
		for ($i = 0; $i < 20; $i++)
		{
			$articles[$i] = new Articles();
			$articles[$i]->setTitle('Article n°' . $i);
			$articles[$i]->setContent(
					"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
					sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
					sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. 
					Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. 
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
					invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et 
					accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata 
					sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
					sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
					At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, 
					no sea takimata sanctus est Lorem ipsum dolor sit amet."
			);
			$articles[$i]->setActive(true);
			
			$manager->persist($articles[$i]);
		}
		
		$manager->flush();
	}
	
}