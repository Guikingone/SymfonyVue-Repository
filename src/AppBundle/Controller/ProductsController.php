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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;

/**
 * Class ProductsController
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class ProductsController extends Controller
{
    /**
     * @Route(path="/products", name="products_all")
     *
     * @throws InvalidOptionsException      Thrown by the form.
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

    /**
     * @Route(path="/products/{name}", name="products_all_api")
     *
     * @param string $name      The category of the products
     *
     * @return JsonResponse     The response.
     */
    public function getProductsByNameAction(string $name)
    {
        $data = $this->get('core.products_manager')->getProductsByName($name);

        return new JsonResponse($data, Response::HTTP_OK);
    }
}