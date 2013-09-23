<?php
namespace Prognoz\MagazineBundle\Services;

use Prognoz\MagazineBundle\Entity\Product;

/**
 * ProductService
 * 
 * @author Arsen Borovinskii
 */
class ProductService {
    /**
     * save EntityManager
     * @DI\Inject("doctrine.orm.entity_manager")
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;    
    /**
     * Constructor
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(\Doctrine\ORM\EntityManager $entityManager) {
        $this->em = $entityManager;
    }
    
    /**
     * Loading products in current category
     * @param int $categoryId
     */
    public function getProductsByCategoryId($categoryId) {
        return $this->em->getRepository("Prognoz\MagazineBundle\Entity\Product")->findBy(array('category' => $categoryId));
    }
    
    /**
     * Loading products and returned randomly $maxProducts
     * @param int $categoryId
     * @param int $maxProducts - how many maximum products will be returned. Set to 0 if no limit
     * @return Product
     */
    public function getRandomProductsByCategoryId($categoryId,$maxProducts=0) {
        $products = $this->em->getRepository("Prognoz\MagazineBundle\Entity\Product")->findBy(array('category' => $categoryId),array('title'=>'ASC'), $maxProducts, 0);
        shuffle($products);
        if ($maxProducts > 0 && count($products) > $maxProducts) {
            return array_slice($products, $maxProducts);        // Возвращаем только часть массива
        }
        return $products;
    }
}

