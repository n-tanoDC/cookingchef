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
        $recipes = [
            $salmon = [
                "recipe-ref" => "recipe-salmon",
                1 => "Mettre les pavés de saumon dans un plat allant au four.",
                2 => "Couper un citron en 2 et le presser sur les pavés. Couper le demi-citron restant en rondelles et les déposer directement sur le saumon.",
                3 => "Ciseler les petits oignons ainsi que le \"vert\" puis les mettre sur les pavés.",
                4 => "Ecraser les câpres et les poser sur le saumon (facultatif).",
                5 => "Verser le vin blanc et un filet d'huile d'olive sur les saumons, saler (très peu), poivrer et faire cuire à 180°, thermostat 6, pendant environ 25 min."
            ]
        ];

        foreach ($recipes as $recipe) {
            for ($i = 1 ; $i < count($recipe) ; $i++) {
                $step = new Step();
                $step->setNumber($i);
                $step->setDescription($recipe[$i]);
                $step->setRecipe($this->getReference($recipe["recipe-ref"]));
                $manager->persist($step);
            }
        }

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