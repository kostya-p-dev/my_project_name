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
        $to = "kostya.p.dev@gmail.com";
        $subject = "HTML email";

        $message = "
            <html>
            <head>
            <title>HTML email</title>
            </head>
            <body>
            <p>This email contains HTML Tags!</p>
            <table>
            <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            </tr>
            <tr>
            <td>John</td>
            <td>Doe</td>
            </tr>
            </table>
            </body>
            </html>
            ";

// Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";


        $res =  mail($to,$subject,$message,$headers);
        var_dump($res);
        return new Response('Hello world!');
    }

    public function send_mail($to,$from,$subject,$msg){

//        $headers ="MIME-Version: 1.0 \r\n";
//        $headers.="from: $from \r\n";
//        $headers.="Reply-To: $from" . "\r\n" .
//        $headers.="Content-type: text/html;charset=utf-8 \r\n";
//        $headers.="X-Priority: 3\r\n";
//        $headers.="X-Mailer: smail-PHP ".phpversion()."\r\n";
//        $msg    ='
//            <div style="text-align:left">
//            <h2>'.$subject.'</h2>
//            '.$msg.'
//            </div>
//            ';
//
//        if( mail($to,$subject,$msg,$headers) ){
//            return true;
//        }else{
//            return false;
//        }
    }
}
