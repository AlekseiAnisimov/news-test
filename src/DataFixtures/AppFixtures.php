<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\{Categories, CategoriesTree, News, NewsCategories};

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $date = new \DateTime();

        //Facker для Рубрик
        for ($i = 0; $i < 100; $i++) {
            $categories = new Categories();
            $categories->setName('Category' . $i);
            $categories->setCreatedAt($date);
            $manager->persist($categories);
        }

        //Facker для вложенных рубрик
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $categoriesTree = new CategoriesTree();
                $categoriesTree->setCategoryId($i);
                $categoriesTree->setChildCategory(mt_rand(1, 100));
                $manager->persist($categoriesTree);
            }
        }

        //Facker для новостей
        for ($i = 0; $i < 100; $i++) {
            $news = new News();
            $news->setHeader("News" . $i);
            $news->setText($this->randomString(250));
            $manager->persist($news);
        }

        //Facker для новостей с классифкацией
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $newsCat = new NewsCategories();
                $newsCat->setNewsId($i);
                $newsCat->setCategoryId(mt_rand(1, 100));
                $manager->persist($newsCat);
            }
        }


        $manager->flush();
    }

    /**
     * Сгенерируем случайную строку
     * @param int $len
     * @return string
     */
    private function randomString(int $len) :string
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        return  substr(str_shuffle($permitted_chars), 0, $len);
    }
}
