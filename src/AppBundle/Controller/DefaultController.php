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
            ->setSubject('SYsky2 #'. rand(1000000000, 1000000000000))
            ->setFrom('ermine.test1@gmail.com')
            ->setTo('kostya.p.dev@gmail.com')
            ->setBody($this->renderView('Emails/registration.html.twig', array('name' => 'TEST')))
            ->setContentType('text/html')
        ;
        $resp = $mailer->send($message);

        var_dump($resp);
        return new Response('Hello world!');



//        $to      = 'kostya.p.dev@gmail.com';
//        $from    = 'kostya.p.dev@gmail.com';
//        $subject = 'New Order! #' .rand(1000, 100000);
//        $message = $this->renderView('Emails/registration.html.twig', array('name' => 'TEST'));
//
//        $res = $this->send_mail($to,$from,$subject,$message);
//
//        var_dump($res);
//        return new Response('Hello world!');
    }

    public function send_mail($to,$from,$subject,$msg){

        $headers ="MIME-Version: 1.0 \r\n";
        $headers.="from: $from \r\n";
        $headers.="Reply-To: $from" . "\r\n" .
        $headers.="Content-type: text/html;charset=utf-8 \r\n";
        $headers.="X-Priority: 3\r\n";
        $headers.="X-Mailer: smail-PHP ".phpversion()."\r\n";
        $msg    ='
            <div style="text-align:left">
            <h2>'.$subject.'</h2>
            '.$msg.'
            </div>
            ';

        if( mail($to,$subject,$msg,$headers) ){
            return true;
        }else{
            return false;
        }
    }
}
