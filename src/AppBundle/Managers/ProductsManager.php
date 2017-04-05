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
use AppBundle\Form\Type\SearchProductsType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;

/**
 * Class ProductsManager
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class ProductsManager
{
    /** @var EntityManager */
    private $doctrine;

    /** @var FormFactory */
    private $form;

    /** @var RequestStack */
    private $request;

    /**
     * ProductsManager constructor.
     *
     * @param EntityManager $doctrine
     * @param FormFactory   $form
     * @param RequestStack  $request
     */
    public function __construct (
        EntityManager $doctrine,
        FormFactory $form,
        RequestStack $request
    ) {
        $this->doctrine = $doctrine;
        $this->form = $form;
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function getAllProducts()
    {
        return $this->doctrine->getRepository(Products::class)->findAll();
    }

    /**
     * @param string $name
     *
     * @return array
     */
    public function getProductsByName(string $name)
    {
        $products = $this->doctrine->getRepository(Products::class)
                                   ->findBy(['category' => $name]);

        $data = [];
        foreach ($products as $product) {
            $data = [
                'name' => $product->getName(),
                'Price' => $product->getPrice(),
                'Category' => $product->getCategory()
            ];
        }

        return $data;
    }

    /**
     * @throws InvalidOptionsException
     *
     * @return \Symfony\Component\Form\FormView
     */
    public function searchProductsByName()
    {
        $request = $this->request->getCurrentRequest();
        $form = $this->form->create(SearchProductsType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // TODO
        }

        return $form->createView();
    }
}