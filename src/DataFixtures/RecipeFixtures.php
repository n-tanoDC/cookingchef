<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Difficulty;
use App\Entity\Recipe;
use App\Entity\RecipeIngredient;
use Cassandra\Date;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use function Sodium\add;

class RecipeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cookies = new Recipe();
        $cookies->setTitle("Cookies");
        $cookies->setBakingTime(new DateTime("2020-01-01 00:09:00"));
        $cookies->setPreparationTime(new DateTime("2020-01-01 00:15:00"));
        $cookies->setNbPersons(4);
        $cookies->setPicture("cookies.jpg");
        $cookies->setCategory($this->getReference("cat-dessert"));
        $cookies->setDifficulty($this->getReference("diff-facile"));
        $cookies->addTag($this->getReference("tag-vegetarien"));
        $this->addReference("recipe-cookies", $cookies);
        $manager->persist($cookies);

        $pancakes = new Recipe();
        $pancakes->setTitle("Pancakes");
        $pancakes->setBakingTime(new DateTime("2020-01-01 00:03:00"));
        $pancakes->setPreparationTime(new DateTime("2020-01-01 00:10:00"));
        $pancakes->setNbPersons(4);
        $pancakes->setPicture("pancakes.jpg");
        $pancakes->setCategory($this->getReference("cat-dessert"));
        $pancakes->setDifficulty($this->getReference("diff-moyen"));
        $pancakes->addTag($this->getReference("tag-vegetarien"));
        $this->addReference("recipe-pancakes", $pancakes);
        $manager->persist($pancakes);

        $salmon = new Recipe();
        $salmon->setTitle("Pavé de saumon");
        $salmon->setBakingTime(new DateTime("2020-01-01 00:10:00"));
        $salmon->setPreparationTime(new DateTime("2020-01-01 00:05:00"));
        $salmon->setNbPersons(4);
        $salmon->setPicture("saumon.jpg");
        $salmon->setCategory($this->getReference("cat-plat"));
        $salmon->setDifficulty($this->getReference("diff-moyen"));
        $salmon->addTag($this->getReference("tag-sans-glucose"));
        $this->addReference("recipe-salmon", $salmon);
        $manager->persist($salmon);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TagFixtures::class,
            CategoryFixtures::class,
            DifficultyFixtures::class,
        ];
    }
}
