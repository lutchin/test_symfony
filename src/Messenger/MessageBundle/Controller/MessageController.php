<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 06.05.2018
 * Time: 12:31
 */
namespace Messenger\MessageBundle\Controller;

use Messenger\MessageBundle\Entity\File;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MessageController extends Controller
{

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