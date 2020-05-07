<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use App\Entity\Recipe;
use App\Entity\RecipeIngredient;
use App\Entity\Unit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecipeIngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $salmon = new RecipeIngredient();
        $salmon->setIngredient($this->getReference("ingredient-saumon"));
        $salmon->setRecipe($this->getReference("recipe-salmon"));
        $salmon->setQuantity(500);
        $salmon->setUnit($this->getReference("unit-gramme"));
        $manager->persist($salmon);

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            UnitFixtures::class,
            IngredientFixtures::class,
            RecipeFixtures::class
        ];
    }
}
