<?php
namespace Prognoz\MagazineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item of product
 * @ORM\Entity
 * @ORM\Table
 * @author Arsen I. Borovinskii
 */
class Card {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * @var integer
     */
    private $id;
    
    /**
     * Reference to user of this Card
     * @ORM\OneToOne(targetEntity="User", inversedBy="card")
     * @var type user;
     */
    private $user;
    
    /**
     * Collections of product in Card
     * @ORM\ManyToMany(targetEntity="Product")           
     * @var type Product Collections
     */
    private $products;
    
    /**
     * Status of card. 0: discard. 1: active. 2: appruved. 3: complete.
     * @ORM\Column(type="integer")            
     * @var type integer
     */
    private $status;
    
    public function __construct() {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();       // products must be initialized in constructor
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
     * Set user
     *
     * @param integer $user
     * @return Card
     */
    public function setUser($user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set products
     *
     * @param integer $products
     * @return Card
     */
    public function setProducts($products)
    {
        $this->products = $products;
    
        return $this;
    }

    /**
     * Get products
     *
     * @return integer 
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Card
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    public function __toString() {
        return "Карта пользователя " . $this->user->getName();
    }
}