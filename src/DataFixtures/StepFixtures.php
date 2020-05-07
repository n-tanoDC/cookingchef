<?php

namespace App\DataFixtures;

use App\Entity\Step;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class StepFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 1;
        $salmon = [];

        $salmon[$i] = new Step();
        $salmon[$i]->setNumber($i);
        $salmon[$i]->setDescription("Mettre les pavés de saumon dans un plat allant au four.");
        $salmon[$i]->setRecipe($this->getReference("recipe-salmon"));
        $manager->persist($salmon[$i]);

        ++$i;

        $salmon[$i] = new Step();
        $salmon[$i]->setNumber($i);
        $salmon[$i]->setDescription("Couper un citron en 2 et le presser sur les pavés. Couper le demi-citron restant en rondelles et les déposer directement sur le saumon.");
        $salmon[$i]->setRecipe($this->getReference("recipe-salmon"));
        $manager->persist($salmon[$i]);

        ++$i;

        $salmon[$i] = new Step();
        $salmon[$i]->setNumber($i);
        $salmon[$i]->setDescription("Ciseler les petits oignons ainsi que le \"vert\" puis les mettre sur les pavés.");
        $salmon[$i]->setRecipe($this->getReference("recipe-salmon"));
        $manager->persist($salmon[$i]);

        ++$i;

        $salmon[$i] = new Step();
        $salmon[$i]->setNumber($i);
        $salmon[$i]->setDescription("Ecraser les câpres et les poser sur le saumon (facultatif).");
        $salmon[$i]->setRecipe($this->getReference("recipe-salmon"));
        $manager->persist($salmon[$i]);

        ++$i;

        $salmon[$i] = new Step();
        $salmon[$i]->setNumber($i);
        $salmon[$i]->setDescription("Verser le vin blanc et un filet d'huile d'olive sur les saumons, saler (très peu), poivrer et faire cuire à 180°, thermostat 6, pendant environ 25 min. */");
        $salmon[$i]->setRecipe($this->getReference("recipe-salmon"));
        $manager->persist($salmon[$i]);

        $i = 1;

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            RecipeFixtures::class
        ];
    }
}