<?php
namespace Prognoz\MagazineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Folder in to Catalog
 * @ORM\Entity
 * @ORM\Table
 * @author Arsen I. Borovinskii
 */
class Category {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var integer
     */
    private $id;
    
    /**     
     * @ORM\Column(type="string")
     * @var type string
     */
    private $title;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Category")
     * @var type Category
     */
    private $parent;      
    
    public function __construct() {
      //  $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->getTitle();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
   

    /**
     * Set parent
     *
     * @param \Prognoz\MagazineBundle\Entity\Category $parent
     * @return Category
     */
    public function setParent(\Prognoz\MagazineBundle\Entity\Category $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \Prognoz\MagazineBundle\Entity\Category 
     */
    public function getParent()
    {
        return $this->parent;
    }

   
}