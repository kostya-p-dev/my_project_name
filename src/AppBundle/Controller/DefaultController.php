<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/email", name="email")
     */
    public function emailAction(Request $request)
    {
        // получаем 'mailer' (обязателен для инициализации Swift Mailer)
        $mailer = $this->get('mailer');

        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('ermine.test1@gmail.com')
            ->setTo('ermine.kostya@gmail.com')
            ->setBody($this->renderView('Emails/registration.html.twig', array('name' => 'TEST')))
        ;
        $resp = $mailer->send($message);

        var_dump($resp);
        return new Response('Hello world!');
    }
}
