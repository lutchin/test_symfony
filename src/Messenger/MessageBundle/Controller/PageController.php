<?php

namespace Messenger\MessageBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('MessengerMessageBundle:Page:index.html.twig');
    }

}
