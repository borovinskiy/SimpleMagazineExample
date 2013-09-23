<?php

namespace Prognoz\MagazineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/contacts")
 */
class ContactsController extends Controller
{
    /**
     * @Route("/", name="_contacts")
     * @Template("PrognozMagazineBundle:Contacts:index.html.twig")
     */
    public function indexAction()
    {
        return array();
    }

}
