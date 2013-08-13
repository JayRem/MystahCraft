<?php
namespace MystahCraft\SiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use MystahCraft\UserBundle\Entity\Group;

class LoadUsersData implements FixtureInterface, ContainerAwareInterface {
	
	private $container;
	
	public function load(ObjectManager $manager) 
	{
		/*
		 * Groups
		 */

		$groups['admins'] = 	new Group('admins', array('ROLE_SUPER_ADMIN'));

		$groups['roi'] = 		new Group('roi', 			array('ROLE_SUPER_ADMIN'));
		$groups['reine'] =		new Group('reine', 			array('ROLE_SUPER_ADMIN'));
		$groups['princes'] = 	new Group('princes', 		array('ROLE_USER'));
		$groups['seigneurs'] = 	new Group('seigneurs', 		array('ROLE_USER'));
		$groups['ducs'] = 		new Group('ducs', 			array('ROLE_USER'));
		$groups['marquis'] = 	new Group('marquis', 		array('ROLE_USER'));
		$groups['comptes'] = 	new Group('comptes', 		array('ROLE_USER'));
		$groups['barons'] = 	new Group('barons', 		array('ROLE_USER'));
		$groups['chevaliers'] = new Group('chevaliers', 	array('ROLE_USER'));
		$groups['ecuyers'] = 	new Group('ecuyers', 		array('ROLE_USER'));
		$groups['gueux'] = 		new Group('gueux', 			array('ROLE_USER'));
		$groups['exiles'] = 	new Group('exiles', 		array('ROLE_USER'));
		$groups['executes'] = 	new Group('executes', 		array('ROLE_USER'));
		
		foreach ($groups as $group)
		{
			$manager->persist($group);
		}
		
		/*
		 * Users
		 */
		
		$userManager = $this->container->get('fos_user.user_manager');
		
		
		//KenshiWado
		$kenshiWado = $userManager->createUser();
		$kenshiWado->setUsername('KenshiWado');
		$kenshiWado->setEmail('jrm.safont@gmail.com');
		$kenshiWado->setPlainPassword('kenshi1337');
		$kenshiWado->addGroup($groups['admins']);
		$kenshiWado->addGroup($groups['barons']);
		$kenshiWado->setEnabled(1);
		
		$userManager->updateUser($kenshiWado);
	}
	public function setContainer(ContainerInterface $container = null) 
	{
		$this->container = $container;
	}

}
