<?php

namespace App\DataFixtures;

use App\Entity\Unit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UnitFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $litre = new Unit();
        $litre->setLabel("litre(s)");
        $this->addReference("unit-litre", $litre);
        $manager->persist($litre);

        $gramme = new Unit();
        $gramme->setLabel("gramme(s)");
        $this->addReference("unit-gramme", $gramme);
        $manager->persist($gramme);

        $cASoupe = new Unit();
        $cASoupe->setLabel("cuillère(s) à soupe");
        $this->addReference("unit-cas", $cASoupe);
        $manager->persist($cASoupe);

        $cACafe = new Unit();
        $cACafe->setLabel("cuillère(s) à café");
        $this->addReference("unit-cac", $cACafe);
        $manager->persist($cACafe);

        $manager->flush();
    }
}
