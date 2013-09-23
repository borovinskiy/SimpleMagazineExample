<?php
namespace Prognoz\MagazineBundle\Services;

use Prognoz\MagazineBundle\Entity\Category;

/**
 * CategoryService
 * @author Arsen Borovinskii
 */
class CategoryService {       
    
    
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
     * get Category by identificator
     * @param int $id
     */
    public function getCategoryById($id) {
        $category = $this->em->getRepository("Prognoz\MagazineBundle\Entity\Category")->find($id); 
        return $category;
    }
    
    /**
     * load children category for category with $id
     * @param int $id
     */
    public function getChildrenByCategoryId($id) {
        $childrens = $category = $this->em->getRepository("Prognoz\MagazineBundle\Entity\Category")->findBy(array('parent'=> $id));
        return $childrens;
    }
}    