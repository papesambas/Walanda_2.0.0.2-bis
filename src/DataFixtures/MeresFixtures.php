<?php

namespace App\DataFixtures;

use App\Entity\Meres;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class MeresFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 120; $i++) {
            $profession  = $this->getReference('profession_' . $faker->numberBetween(150, 300));
            $nina  = $this->getReference('nina_' . $faker->numberBetween(1, 450));
            $telephone  = $this->getReference('telephone_' . $faker->numberBetween(120, 300));

            $mere = new Meres();
            $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
            $prenom  = $this->getReference('prenom_feminin_' . $faker->numberBetween(101, 200));
            $mere->setAdresse($faker->address());
            $mere->setNom($nom);
            $mere->setPrenom($prenom);
            $mere->setProfession($profession);
            //$mere->setNina($nina);
            //$mere->addTelephone($telephone);

            $manager->persist($mere);
            $this->addReference('mere_' . $i, $mere);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            PeresFixtures::class,
        ];
    }
}
