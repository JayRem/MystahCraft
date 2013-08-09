<?php
namespace MystahCraft\SiteBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MystahCraft\SiteBundle\Entity\TypesContenus;
use MystahCraft\SiteBundle\Entity\Contenus;

class LoadContenusData implements FixtureInterface
{

	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager) {
		/*
		 * Déclaration des types
		 */
		
		$types = array();

		$types['ip-serveur'] = new TypesContenus();
		$types['ip-serveur']->setType('ip-serveur');
		
		$types['regle'] = new TypesContenus();
		$types['regle']->setType('regle');

		$types['entete-regle'] = new TypesContenus();
		$types['entete-regle']->setType('entete-regle');

		$types['pied-regle'] = new TypesContenus();
		$types['pied-regle']->setType('pied-regle');
		
		$types['signature-regle'] = new TypesContenus();
		$types['signature-regle']->setType('signature-regle');
		
		
		/*
		 * Déclaration des contenus
		 */
		
		// Ip du serveur
		
		$ipServeur = new Contenus();
		$ipServeur->setValeur("77.111.208.238:25565");
		$types['ip-serveur']->addContenu($ipServeur);
		
		// Entête des règles
		
		$regleEntete = new Contenus();
		$regleEntete->setValeur("Règles du serveur");
		$types['entete-regle']->addContenu($regleEntete);
		
		// Règles
		
		$reglesText = array();
		$reglesText[] = "Il est interdit de rentrer chez les gens sans autorisation, de voler, de détruire.";
		$reglesText[] = "Il est interdit de miner sauvagement; des mines communes sont là pour ça. Dans ces mines il faut respecter l'agencement des galleries.";
		$reglesText[] = "Il est interdit de construire quoique ce soit sans l'autorisation préalable d'un admin. Celle ci est quasi systématique.";
		$reglesText[] = "Les maisons doivent respecter le style et l'architecture du village concerné et rester raisonnables par leur taille et leur architectures (pas de souterrains géants etc ...).";
		$reglesText[] = "Il est interdit de détruire le paysage. Les arbres doivent être coupés intégralement puis replantés. La récolte de sable par exemple ne doit pas défigurer le paysage.";
		$reglesText[] = "Les entrepôts, les champs et les enclos sont communautaires mais il faut participer a leurs entretiens (remplissage de coffre, reproduction des animaux, culture des champs).";
		$reglesText[] = "L'impolitesse, les propos racistes ou haineux seront punis d'un bannissement immédiat.";
		$reglesText[] = "Le pvp sauvage est interdit sauf exceptions (accord du joueurs, quête etc ...)";
		$reglesText[] = "L'utilisation de mods de triche sera facilement et rapidement détéctée et entrainera le banissement immédiat.";
		$reglesText[] = "Il est interdit d'explorer le monde en allant en ligne droite. Il faut explorer biome par biome.
						Le fait de faire des lignes droites de terrain exploré ne sert a rien et fait buggé le monde en créant des terrains corrompus (falaises abruptes).";
		
		foreach ($reglesText as $regleText)
		{
			$regle = new Contenus();
			$regle->setValeur($regleText);
			$types['regle']->addContenu($regle);
		}
		
		// Pied des règles
		
		$reglePied= new Contenus();
		$reglePied->setValeur("Mis a part ça, éclatez vous bien !");
		$types['pied-regle']->addContenu($reglePied);
		
		$regleSignature = new Contenus();
		$regleSignature->setValeur("Le roi et la reine");
		$types['signature-regle']->addContenu($regleSignature);
		
		foreach ($types as $type)
		{
			$manager->persist($type);
		}
		/*
		 * Flush de tous les contenus
		 */
		$manager->flush();
	}

}