<?php

/*
 * This file is part of the SymfonyVue project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Products
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Products
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=50, nullable=false)
     */
    private $price;

    /**
     * @return int
     */
    public function getId () : int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName () : string
    {
        return $this->name;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName ($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrice () : string
    {
        return $this->price;
    }

    /**
     * @param $price
     *
     * @return $this
     */
    public function setPrice ($price)
    {
        $this->price = $price;

        return $this;
    }
}