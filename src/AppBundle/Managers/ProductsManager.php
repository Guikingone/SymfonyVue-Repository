<?php

/*
 * This file is part of the SymfonyVue project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Managers;

use AppBundle\Entity\Products;
use Doctrine\ORM\EntityManager;

/**
 * Class ProductsManager
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class ProductsManager
{
    /** @var EntityManager */
    private $doctrine;

    /**
     * ProductsManager constructor.
     *
     * @param EntityManager $doctrine
     */
    public function __construct (EntityManager $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return array
     */
    public function getAllProducts()
    {
        return $this->doctrine->getRepository(Products::class)->findAll();
    }
}