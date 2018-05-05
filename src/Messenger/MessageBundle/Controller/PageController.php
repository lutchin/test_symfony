<?php

namespace Messenger\MessageBundle\Controller;

use Messenger\MessageBundle\Entity\File;
use Messenger\MessageBundle\Entity\Message;
use Messenger\MessageBundle\Form\FilesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('MessengerMessageBundle:Page:index.html.twig');
    }

    public function sendmessagesAction(Request $request)
    {
        $file = new File();
        $form = $this->createForm(FilesType::class, $file);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $message = new Message();
            $message->setMessage($form->get('message')->getData());

            $file_name = $file->getfile();
            $fileName = md5(uniqid()).'.'.$file_name->guessExtension();
            $file_name->move(
                $this->getParameter('files_directory'),
                $fileName
            );
            $file->setTitle($form->get('title')->getData());
            $file->setFile($fileName);
            $file->setMessage($message);


            $em = $this->getDoctrine()->getManager();
            $em->persist($file);
            $em->persist($message);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Сообщение добавлено. Спасибо!');

            return $this->redirectToRoute('messenger_message_sendmessages');
        }
                return $this->render('MessengerMessageBundle:Page:sendmessages.html.twig', array(
                    'form' => $form->createView()));

    }


    public function listmessagesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $list = $em->createQueryBuilder()
            ->select('m')
            ->from('MessengerMessageBundle:File',  'm')
            ->addOrderBy('m.id', 'ASC')
            ->getQuery()
            ->getResult();

        return $this->render('MessengerMessageBundle:Page:listmessages.html.twig', array(
            'list'      => $list,
        ));
    }

}
