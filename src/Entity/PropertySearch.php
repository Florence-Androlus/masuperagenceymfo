<?php

namespace App\Entity;

use App\Entity\PropertySearch;
use Symfony\Component\Validator\Constraints as Assert;

Class PropertySearch
{
     /**
     * @var int|null
     */
    private $maxPrice;

     /**
     * @var int|null
     * @Assert\Range(min=10,max=400)
     */
    private $minSurface;


    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    public function setMaxPrice($maxPrice): PropertySearch
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }


    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    public function setMinSurface(int $minSurface): PropertySearch
    {
        $this->minSurface = $minSurface;

        return $this;
    }
}