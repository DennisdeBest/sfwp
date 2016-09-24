<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle::home.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('AppBundle::about.html.twig');
    }

    public function contactAction() {
        return $this->render('AppBundle::contact.html.twig');
    }
}
