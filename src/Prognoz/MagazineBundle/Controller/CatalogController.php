<?php

namespace Prognoz\MagazineBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * Category controller.
 *
 * @Route("/api/catalog")
 */
class CatalogController extends Controller
{

    /**
     * Lists all Category entities.
     *
     * @Route("/", name="api_catalog")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {   
        $catalogService = $this->get('prognoz_magazine.catalog_service');
        
        $catalogService->loadCatalog();               

        $catalog = $catalogService->getCatalog();
        
        if ($this->getRequest()->query->get('format') === 'json') {       // Возвращаем user в json                
            return \Symfony\Component\HttpFoundation\JsonResponse::create($catalog[0]['childrens']);
        }                
        
        return array(
            'catalog' => $catalog[0]['childrens']
        );
    }
    
    /**
     * Finds and displays a Catalog and random Products in Catalog and subCatalogs.
     *
     * @Route("/{id}", name="api_catalog_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('PrognozMagazineBundle:Category')->find($id);
        if (!$category) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }
        
        $catalogService = $this->get('prognoz_magazine.catalog_service');        
        $catalogService->loadCatalog();     
        $catalog = $catalogService->getCatalog();
        $products = $catalogService->loadProductsByCatalogId($id);  
        $randomProducts = $catalogService->loadAllChildrenProductsByCategoryId($id, 12);        
        
        if ($this->getRequest()->query->get('format') === 'json') {
            return \Symfony\Component\HttpFoundation\JsonResponse::create(array('id' => $category->getId(), 'title' => $category->getTitle()));
        }        
        
        return array(
            'parent_id' => $category->getParent() ? $category->getParent()->getId() : null,
            'category' => $category,
            'catalog' => $catalog[0]['childrens'],
            'products' => $products,
            'random_products' => $randomProducts,
        );
    }
    
}    
