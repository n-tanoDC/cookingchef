<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $saumon = new Ingredient();
        $saumon->setLabel("saumon");
        $this->addReference('ingredient-saumon', $saumon);
        $manager->persist($saumon);

        $lait = new Ingredient();
        $lait->setLabel("lait");
        $this->addReference('ingredient-lait', $lait);
        $manager->persist($lait);


        $sucre = new Ingredient();
        $sucre->setLabel("sucre");
        $this->addReference('ingredient-sucre', $sucre);
        $manager->persist($sucre);


        $farine = new Ingredient();
        $farine->setLabel("farine");
        $this->addReference('ingredient-farine', $farine);
        $manager->persist($farine);


        $chocolat = new Ingredient();
        $chocolat->setLabel("chocolat");
        $this->addReference('ingredient-chocolat', $chocolat);
        $manager->persist($chocolat);


        $beurre = new Ingredient();
        $beurre->setLabel("beurre");
        $this->addReference('ingredient-beurre', $beurre);
        $manager->persist($beurre);


        $citron = new Ingredient();
        $citron->setLabel("citron");
        $this->addReference('ingredient-citron', $citron);
        $manager->persist($citron);

        $manager->flush();
    }
}
