<?php
namespace Prognoz\MagazineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Folder in to Catalog
 * @ORM\Entity
 * @ORM\Table
 * @author Arsen I. Borovinskii
 */
class Photo {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var integer
     */
    private $id;
    
    /**
     * name of photo in folders with upload photo
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

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
     * Set name
     *
     * @param string $name
     * @return Photo
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
}