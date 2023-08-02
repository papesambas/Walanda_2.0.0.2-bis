<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Users;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture implements DependentFixtureInterface
{
    private $counter = 1;
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
    ) {
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $superAdmin = new Users();
        $superAdmin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $superAdmin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $superAdmin->setEmail('superadmin@demo.fr');
        $superAdmin->setFullName('Super Admin');
        $superAdmin->setUsername('superadmin');
        $superAdmin->setPassword(
            $this->passwordEncoder->hashPassword($superAdmin, 'superadmin')
        );
        $superAdmin->setRoles(['ROLE_SUPERADMIN']);
        $manager->persist($superAdmin);
        $this->addReference('user-' . $this->counter, $superAdmin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Admin');
        $admin->setUsername('admin');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'admin123')
        );
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;


        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('secretaire');
        $admin->setUsername('secretaire');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'secretaire123')
        );
        $admin->setRoles(['ROLE_SECREATAIRE']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Caissier');
        $admin->setUsername('ciassier');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'caissier123')
        );
        $admin->setRoles(['ROLE_CAISSIER']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Comptable');
        $admin->setUsername('comptable');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'comptable123')
        );
        $admin->setRoles(['ROLE_COMPTABLE']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Finance');
        $admin->setUsername('finance');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'finance123')
        );
        $admin->setRoles(['ROLE_FINANCE']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Surveillant');
        $admin->setUsername('surveillant');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'surveillant123')
        );
        $admin->setRoles(['ROLE_SURVEILLANT']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Enseignant1');
        $admin->setUsername('enseignant1');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'enseignant1123')
        );
        $admin->setRoles(['ROLE_ENSEIGNANT']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Enseignant2');
        $admin->setUsername('enseignant2');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'enseignant2123')
        );
        $admin->setRoles(['ROLE_ENSEIGNANT']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Enseignant3');
        $admin->setUsername('enseignant3');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'enseignant3123')
        );
        $admin->setRoles(['ROLE_ENSEIGNANT']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Eleve1');
        $admin->setUsername('eleve1');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'eleve1123')
        );
        $admin->setRoles(['ROLE_ELEVE']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Eleve2');
        $admin->setUsername('eleve2');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'eleve2123')
        );
        $admin->setRoles(['ROLE_ELEVE']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Eleve3');
        $admin->setUsername('eleve3');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'eleve3123')
        );
        $admin->setRoles(['ROLE_ELEVE']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Eleve4');
        $admin->setUsername('eleve4');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'eleve4123')
        );
        $admin->setRoles(['ROLE_ELEVE']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Eleve5');
        $admin->setUsername('eleve5');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'eleve5123')
        );
        $admin->setRoles(['ROLE_ELEVE']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Parent1');
        $admin->setUsername('parent1');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'parent1123')
        );
        $admin->setRoles(['ROLE_PARENT']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Parent2');
        $admin->setUsername('parent2');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'parent2123')
        );
        $admin->setRoles(['ROLE_PARENT']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        for ($i = 1; $i <= 10; $i++) {
            $user = new Users();
            $user->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
            $user->setPrenom($this->getReference('prenom_masculin_' . $faker->numberBetween(1, 100)));
            $user->setEmail($faker->email);
            $user->setFullName($faker->lastName() . ' ' . $faker->firstNameMale());
            $user->setUsername('User' . ' ' . $this->counter);
            $user->setPassword(
                $this->passwordEncoder->hashPassword($user, 'secret')
            );
            $manager->persist($user);
            $this->addReference('user-' . $this->counter, $user);
            $this->counter++;
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            TelephonesFixtures::class
        ];
    }
}
