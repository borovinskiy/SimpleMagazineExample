<?php
namespace Prognoz\MagazineBundle\Services;

use Prognoz\MagazineBundle\Entity\Catalog;

/**
 * UserService
 * @author Arsen Borovinskii
 */
class CatalogService {       
    
    
    /**
     * save EntityManager
     * @DI\Inject("doctrine.orm.entity_manager")
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;        
    
    /**
     * save CatalogService
     * @DI\Inject("prognoz_magazine.category_service")
     * @var \Prognoz\MagazineBundle\Entity\CategoryService
     */
    protected $categoryService;    
    
     /**
     * save ProductService
     * @DI\Inject("prognoz_magazine.product_service")
     * @var \Prognoz\MagazineBundle\Entity\ProductService
     */
    protected $productService;    
    
    /**
     * Identificator of root catalog.
     * @var Category $rootId
     */
    protected $rootCategory;
    
    /**
     * Catalog as full tree
     * @var Array Catalog
     */
    protected $catalog = Array();
    
    /**
     * Constructor
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(\Doctrine\ORM\EntityManager $entityManager, $categoryService, $productService ) {        
        $this->em = $entityManager;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->setRootCategory($this->categoryService->getCategoryById(1));
        
    }    

    /**
     * Get Root Category of Catalog tree
     * @return Category
     */
    public function getRootCategory() {
        return $this->rootCategory;
    }

    /**
     * Set Root Category of Catalog tree
     * @param Category $rootCategory
     */
    public function setRootCategory($rootCategory) {
        $this->rootCategory = $rootCategory;
    }

    public function getCatalog() {
        return $this->catalog;
    }

    public function setCatalog(Array $catalog) {
        $this->catalog = $catalog;
    }

            
    /**
     * Loading all categories from DB
     */
    public function loadCatalog() {
        $level = 0;
        $category = $this->getRootCategory();
        $id = $this->getRootCategory()->getId();
        $this->catalog[$level] = $this->loadRecursivlyCatalog($id, array('title'=>$category->getTitle(),'id'=>$id));
        
    }
    
    /**
     * Load randomly products by Catalog identificator. No more $maxProducts. Set $maxProducts to 0 for not usage limit.
     * @param int $catalogId
     * @param int $maxProducts - max products from catalog
     * @return Products - Array of Products in Catalog with identificator $catalogId
     */
    public function loadProductsByCatalogId($catalogId,$maxProducts=12) {
        
        $products = $this->productService->getRandomProductsByCategoryId($catalogId, $maxProducts);

        return $products;
    }
    
    /**
     * Load randomly products from Catalog with $catalogId and all products in your subcatalog.
     * @param int $limit - max returned products. Set $limit to 0 for no limit.
     * @param int $catalogId
     */
    public function loadAllChildrenProductsByCategoryId($categoryId,$limit = 0) {
        $products = $this->loadRecursivlyProductsByCategoryId($categoryId);
        shuffle($this->productsInCategory);
        if (is_numeric($limit) && $limit > 0) {
            return array_slice($this->productsInCategory,0,$limit);
        }
        return $this->productsInCategory;
    }
    
    private $productsInCategory = array();
    
    /**
     * Load all products from Catalog with $categoryId into simple Array Array(1=>Product, 2=>Product, 3=>Product,...);
     * @param int $categoryId
     * @return Array of products
     */
    protected function loadRecursivlyProductsByCategoryId($categoryId,$catalogArray=array()) {
        $products = array();
        $category = $this->categoryService->getCategoryById($categoryId);
        $childrens = $this->categoryService->getChildrenByCategoryId($categoryId);
        $catalogArray['id'] = $category->getId();
        $catalogArray['title'] = $category->getTitle();
        for ($i=0; $i < count($childrens); $i++ ) {            
            //$catalogArray[$i] = array();
            if (!is_null($childrens[$i])) {
                $catalogArray['childrens'][$i] =  $this->loadRecursivlyProductsByCategoryId($childrens[$i]->getId(), Array());                
                $productsArray = $this->em->getRepository("Prognoz\MagazineBundle\Entity\Product")->findBy(array('category' => $childrens[$i]->getId()));
                if (is_array($productsArray) && count($productsArray) > 0) {
                    foreach ($productsArray as $product) {
                        $this->productsInCategory[] = $product;                        
                    }
                }
            }    
        }
        
        return $catalogArray; 
    }
    
    /**
     * Recusivly loading category to catalogArray with structure item as array('id','title','parent', 'parent_id','childrens'=>array(...))
     */
    private function loadRecursivlyCatalog($categoryId, $catalogArray=array()) {
        $category = $this->categoryService->getCategoryById($categoryId);
        $childrens = $this->categoryService->getChildrenByCategoryId($categoryId);
        $catalogArray['id'] = $category->getId();
        $catalogArray['title'] = $category->getTitle();
        for ($i=0; $i < count($childrens); $i++ ) {            
            //$catalogArray[$i] = array();
            if (!is_null($childrens[$i])) {
                $catalogArray['childrens'][$i] =  $this->loadRecursivlyCatalog($childrens[$i]->getId(), array());
            }    
        }
        return $catalogArray; 
    }
}


