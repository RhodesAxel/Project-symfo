<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BlogFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $c1 = new Blog();
         $c1 -> setTitre("Article1")
             -> setArticle("Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illo itaque distinctio inventore mollitia minima iste nesciunt eligendi alias. Perferendis molestias provident quae nesciunt laudantium fugit odio laboriosam adipisci ex!Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illo itaque distinctio inventore mollitia minima iste nesciunt eligendi alias. Perferendis molestias provident quae nesciunt laudantium fugit odio laboriosam adipisci ex!")
             -> setAuteur("auteur1")
             ->setImages("blog1.jpg");

        $manager->persist($c1);

        $c2 = new Blog();
        $c2 -> setTitre("Article2")
            -> setArticle("Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illo itaque distinctio inventore mollitia minima iste nesciunt eligendi alias. Perferendis molestias provident quae nesciunt laudantium fugit odio laboriosam adipisci ex!Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illo itaque distinctio inventore mollitia minima iste nesciunt eligendi alias. Perferendis molestias provident quae nesciunt laudantium fugit odio laboriosam adipisci ex!")
            -> setAuteur("auteur2")
            ->setImages("blog2.jpg");
            


       $manager->persist($c2);

       $c3 = new Blog();
       $c3 -> setTitre("Article3")
           -> setArticle("Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illo itaque distinctio inventore mollitia minima iste nesciunt eligendi alias. Perferendis molestias provident quae nesciunt laudantium fugit odio laboriosam adipisci ex!Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illo itaque distinctio inventore mollitia minima iste nesciunt eligendi alias. Perferendis molestias provident quae nesciunt laudantium fugit odio laboriosam adipisci ex!")
           -> setAuteur("auteur3")
           ->setImages("blog3.jpg");
          


      $manager->persist($c3);

      $c4 = new Blog();
      $c4 -> setTitre("Article4")
          -> setArticle("Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illo itaque distinctio inventore mollitia minima iste nesciunt eligendi alias. Perferendis molestias provident quae nesciunt laudantium fugit odio laboriosam adipisci ex!Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illo itaque distinctio inventore mollitia minima iste nesciunt eligendi alias. Perferendis molestias provident quae nesciunt laudantium fugit odio laboriosam adipisci ex!")
          -> setAuteur("auteur4")
          ->setImages("blog4.jpg");
          


     $manager->persist($c4);

        $manager->flush();
    }
}
