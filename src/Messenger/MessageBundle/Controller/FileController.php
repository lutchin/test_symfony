<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 06.05.2018
 * Time: 12:30
 */

namespace Messenger\MessageBundle\Controller;

use Messenger\MessageBundle\Entity\File;
use Messenger\MessageBundle\Entity\Message;
use Messenger\MessageBundle\Form\MessageType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FileController extends Controller
{
	public function sendmessagesAction(Request $request)
	{
		$message = new Message();
		$form = $this->createForm(MessageType::class, $message);


		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {

			$file = new File();
			$file ->setFile($form->get('upload_file')->getData());


			$file_names = $file->getFile();

			

			foreach ($file_names as $file_name){

			$fileName = md5(uniqid()).'.'.$file_name->guessExtension();
			$file_name->move(
				$this->getParameter('files_directory'),
				$fileName
			);

			$file->setFile($fileName);
			$message->addFile($file);

			}
            $em = $this->getDoctrine()->getManager();
            $message->setTitle($form->get('title')->getData());
			$message->setMessage($form->get('message')->getData());
			$em->persist($message);
			$em->persist($file);
            $em->flush();

			$this->get('session')->getFlashBag()->add('notice', 'Сообщение добавлено. Спасибо!');

			return $this->redirectToRoute('messenger_message_sendmessages');
		}
		return $this->render('MessengerMessageBundle:Page:sendmessages.html.twig', array(
			'form' => $form->createView()));

	}
}