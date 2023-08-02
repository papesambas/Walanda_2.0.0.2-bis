<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
use App\Entity\LieuNaissances;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LieuNaissancesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 300; $i++) {
            $lieu = new LieuNaissances();
            $commune = $this->getReference('commune_' . $faker->numberBetween(1, 175));
            $lieu->setCommune($commune);
            $lieu->setDesignation($faker->unique()->city());
            $manager->persist($lieu);
            $this->addReference('lieu_' . $i, $lieu);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CommunesFixtures::class,
        ];
    }
}
