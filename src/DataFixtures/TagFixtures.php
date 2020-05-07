<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tags = [
            "vegetarien" => "Végétarien",
            "sans-glucose" => "Sans glucose",
            "fruits" => "Fruits",
            "legumes" => "Légumes"
        ];

        foreach ($tags as $key => $tag) {
            $label = new Tag();
            $label->setLabel($tag);
            $manager->persist($label);
            $this->addReference("tag-" . $key, $label);
        }

        $manager->flush();
    }
}
