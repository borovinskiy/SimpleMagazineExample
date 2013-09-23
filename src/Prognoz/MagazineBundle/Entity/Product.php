<?php
namespace Prognoz\MagazineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile; 
use Symfony\Component\Validator\Constraints as Assert;
use Exception;

/**
 * Item of product
 * @ORM\Entity
 * @ORM\Table
 * @ORM\HasLifecycleCallbacks
 * @author Arsen I. Borovinskii
 */
class Product {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var integer
     */
    private $id;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $title;
    
    /**
     * @ORM\ManyToOne(targetEntity="Color")      
     * @ORM\JoinColumn(name="color_id", referencedColumnName="id")
     * @var integer
     */
    private $color;
    
    /**
     * Cost of product 
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $price;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category")      
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * @var integer
     */
    private $category;
    
    /**
     * @Assert\File(maxSize="6000000")
     * @var file.
     */
    private $photo;
    
    /**
     * temp var for upload file
     * @var UploadedFile
     */
    private $temp;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;    

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->getId().'.'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'img/product';
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
     * @return Product
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
     * Set color
     *
     * @param integer $color
     * @return Product
     */
    public function setColor($color)
    {
        $this->color = $color;
    
        return $this;
    }

    /**
     * Get color
     *
     * @return integer 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set category
     *
     * @param integer $category
     * @return Product
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return integer 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets photo.
     *
     * @param UploadedFile $file
     */
    public function setPhoto(UploadedFile $file = null)
    {
         $this->photo = $file;
        // check if we have an old image path
        if (is_file($this->getAbsolutePath())) {
            // store the old name to delete after the update
            $this->temp = $this->getAbsolutePath();
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getPhoto()) {
            $this->path = $this->getPhoto()->guessExtension();
        }
    }
    
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getPhoto()) {
            return;
        }

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->temp);
            // clear the temp image path
            $this->temp = null;
        }

        // you must throw an exception here if the file cannot be moved
        // so that the entity is not persisted to the database
        // which the UploadedFile move() method does
        try {
            $this->getPhoto()->move(
                $this->getUploadRootDir(),
                $this->id.'.'.$this->getPhoto()->guessExtension()
            );
        } catch (Exception $e) {
            error_log("Error while move uploaded image to dir.");
            throw new Exception("Error while move uploaded image of product to dir" . $this->getUploadRootDir());
        }    

        $this->setPhoto(null);
    }

    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->temp = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (isset($this->temp)) {
            unlink($this->temp);
        }
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->id.'.'.$this->path;
    }
    
    /**
     * Get photo.
     *
     * @return UploadedFile
     */
    public function getPhoto()
    {
        return $this->photo;
    }
    
    /**
     * convert object to string
     * @return string
     */
    public function __toString() {
        return $this->getTitle();
    }
}