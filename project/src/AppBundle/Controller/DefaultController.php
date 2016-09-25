<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
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

    public function contactAction(Request $request) {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $contact->setSenddate(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
        }

        return $this->render('AppBundle::contact.html.twig', array('form' =>$form->createView()));
    }

    public function showcaseAction() {
        $repo = $this->getDoctrine()->getRepository('AppBundle:Showcase');
        $showcases = $repo->findAll();
        return $this->render('AppBundle::showcase.html.twig', array('showcases'=>$showcases));
    }


}
