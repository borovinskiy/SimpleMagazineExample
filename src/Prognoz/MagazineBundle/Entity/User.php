<?php
namespace Prognoz\MagazineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Item of product
 * @ORM\Entity(repositoryClass="Prognoz\MagazineBundle\Entity\UserRepository") 
 * @ORM\Table
 * @author Arsen I. Borovinskii
 */
class User {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var integer
     */
    private $id;
    
    /**
     * phone must be replace login and password
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @var type string
     */
    private $phone;
    
    /**
     * user name
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @var type string
     */
    private $name;
    
    /**
     * @ORM\OneToOne(targetEntity="Card", mappedBy="user")
     * @var type Card
     */
    private $card; 
   

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
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set card
     * @param Card $card
     */
    public function setCard($card) {
        $this->card = $card;
    }
    
    /**
     * Get Card
     * @return Card 
     */
    public function getCard() {
        return $this->card;
    }
    
    /**
     * convert user object to string
     * @return string
     */
    public function __toString() {
        return $this->getName();
    }
}