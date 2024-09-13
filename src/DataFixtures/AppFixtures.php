<?php

namespace App\DataFixtures;

use App\Entity\Doctor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $specialisations_medicales = [
            "Cardiologie",
            "Dermatologie",
            "Neurologie",
            "Pédiatrie",
            "Oncologie",
            "Psychiatrie",
            "Chirurgie générale",
            "Gynécologie-obstétrique",
            "Ophtalmologie",
            "Anesthésiologie"
        ];
        for ($i = 0; $i < 30; $i++) {
            $doctor = new Doctor();
            $doctor->setFirstname($faker->firstName());
            $doctor->setLastname($faker->lastName());
            $doctor->setSpeciality($faker->randomElement($specialisations_medicales));
            $doctor->setAddress($faker->streetAddress());
            $doctor->setCity($faker->city());
            $doctor->setZip($faker->postcode());
            $doctor->setPhone($faker->numerify('06########'));

            $manager->persist($doctor);
        }
        $manager->flush();
    }
}
