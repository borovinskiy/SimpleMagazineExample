<?php
namespace Prognoz\MagazineBundle\Services;

use Prognoz\MagazineBundle\Entity\User;

/**
 * UserService
 * @author Arsen Borovinskii
 */
class UserService {       
    
    
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
     * Add user with $name and $phone. 
     * @param String $name - username
     * @param String $phone
     * @return integer (user id) or null;
     */
    public function addUser($name,$phone="") {         
         $user = new User();
         if ($phone) {
            $user->setPhone($phone);
         }
         if ($name) {
             $user->setName($name);
             $this->em->persist($user);
             $this->em->flush();
             return $user->getId();
         }         
    }
    
    /**
     * Loading user by Id
     * @var User 
     */
    public function getUserById($id) {
        $user = $this->em->getRepository("Prognoz\MagazineBundle\Entity\User")->find($id); 
        return $user;
    }
}


