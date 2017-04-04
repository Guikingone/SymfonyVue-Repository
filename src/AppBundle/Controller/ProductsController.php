<?php

/*
 * This file is part of the SymfonyVue project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ProductsController
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class ProductsController extends Controller
{
    /**
     * @Route(path="/products", name="products_all")
     */
    public function getAllProductsAction()
    {
        $products = $this->get('core.products_manager')->getAllProducts();

        $form = $this->get('core.products_manager')->searchProductsByName();

        return $this->render('Logic/products.html.twig', [
            'products' => $products,
            'searchForm' => $form
        ]);
    }
}