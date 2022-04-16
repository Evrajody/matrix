<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_BE');

        // Creation de 50 utilisateurs
        $users[] = array();

        for ($i=0; $i < 50; $i++) { 
            $use = new Utilisateur();
            $use->setNomUtilisateur($faker->lastName);
            $use->setPrenomUtilisateur($faker->firstName);
            $use->setPhoneUtilisateur($faker->phoneNumber);
            $use->setEmailUtilisateur($faker->email);
            $use->setAdresseUtilisateur($faker->address);
            $users[$i] = $use;
            $manager->persist($users[$i]);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
