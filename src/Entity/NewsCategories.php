<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NewsCategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=NewsCategoriesRepository::class)
 */
class NewsCategories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $news_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $category_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewsId(): ?int
    {
        return $this->news_id;
    }

    public function setNewsId(int $news_id): self
    {
        $this->news_id = $news_id;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }
}
