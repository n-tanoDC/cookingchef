<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = ["Entrée", "Plat", "Dessert"];
        foreach ($categories as $category) {
            $cat = new Category();
            $cat->setLabel($category);
            $manager->persist($cat);
            $this->addReference(strtolower("cat-" . $category), $cat);
        }

        $manager->flush();
    }
}
