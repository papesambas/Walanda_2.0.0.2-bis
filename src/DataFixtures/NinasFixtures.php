<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Ninas;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class NinasFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 1000; $i++) {
            $nina = new Ninas();
            $nina->setDesignation($faker->unique()->bothify('########## ?'));

            $manager->persist($nina);
            $this->addReference('nina_' . $i, $nina);
        };

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            NomPrenomFixtures::class,
        ];
    }
}
