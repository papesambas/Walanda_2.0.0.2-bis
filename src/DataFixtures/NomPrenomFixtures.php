<?php

namespace App\DataFixtures;

use App\Entity\Communes;
use App\Entity\LieuNaissances;
use Faker;
use App\Entity\Noms;
use App\Entity\Cercles;
use App\Entity\Prenoms;
use App\Entity\Regions;
use App\Entity\Professions;
use App\Entity\EcoleProvenances;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class NomPrenomFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $usedNames = [];

        for ($i = 1; $i <= 100; $i++) {
            $nom = new Noms();
            $designation = $faker->lastName;
            $nom->setDesignation($faker->lastName.''.$i);
            $manager->persist($nom);
            $this->addReference('nom_' . $i, $nom);
        }

        for ($i = 1; $i <= 200; $i++) {
            if ($i <= 100) {
                $prenom = new Prenoms();
                $prenom->setDesignation($faker->firstNameMale().''.$i);
                $manager->persist($prenom);
                $this->addReference('prenom_masculin_' . $i, $prenom);
            } else {
                $prenom = new Prenoms();
                $prenom->setDesignation($faker->firstNameFemale().''.$i);
                $manager->persist($prenom);
                $this->addReference('prenom_feminin_' . $i, $prenom);
            }
        }

        for ($i = 1; $i <= 300; $i++) {
            $profession = new Professions();
            $profession->setDesignation($faker->unique()->jobTitle);
            $manager->persist($profession);
            $this->addReference('profession_' . $i, $profession);
        }

        for ($i = 1; $i <= 200; $i++) {
            $ecole = new EcoleProvenances();
            $ecole->setDesignation($faker->unique()->company);
            $manager->persist($ecole);
            $this->addReference('ecole_' . $i, $ecole);
        }

        for ($i = 1; $i <= 7; $i++) {
            $region = new Regions();
            $region->setDesignation('region' . ' ' . $i);
            $manager->persist($region);
            $this->addReference('region_' . $i, $region);
        }

        $manager->flush();
    }
}