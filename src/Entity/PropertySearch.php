<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class PropertySearch
{

    /**
     * @var ArrayCollection
     */
    private $options;

    /**
     * @var
     * @Assert\Range(min=10, max=400)
     */
    private $minSurface;


    /**
     * @var
     * @Assert\Range(min=100, max=400)
     */
    private $maxSurface;

    /**
     * @var
     * @Assert\Range(min=100000, max=10000000)
     */
    private $minPrice;

    /**
     * @var
     * @Assert\Range(min=100000, max=10000000)
     */
    private $maxPrice;


    public function __construct()
    {
        $this->options = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * @param mixed $minSurface
     */
    public function setMinSurface($minSurface): void
    {
        $this->minSurface = $minSurface;
    }

    /**
     * @return mixed
     */
    public function getMaxSurface()
    {
        return $this->maxSurface;
    }

    /**
     * @param mixed $maxSurface
     */
    public function setMaxSurface($maxSurface): void
    {
        $this->maxSurface = $maxSurface;
    }


    /**
     * @return mixed
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * @param mixed $minPrice
     */
    public function setMinPrice($minPrice): void
    {
        $this->minPrice = $minPrice;
    }

    /**
     * @return mixed
     */
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * @param mixed $maxPrice
     */
    public function setMaxPrice($maxPrice): void
    {
        $this->maxPrice = $maxPrice;
    }


    /**
     * @return ArrayCollection
     */
    public function getOptions(): ArrayCollection
    {
        return $this->options;
    }

    /**
     * @param ArrayCollection $options
     */
    public function setOptions(ArrayCollection $options): void
    {
        $this->options = $options;
    }
}
