<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 05.05.2018
 * Time: 20:11
 */

namespace Messenger\MessageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Messenger\MessageBundle\Entity\Message;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class MessageType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('upload_file', FileType::class, array('multiple' =>true,
				'label' => 'Прикрепите файл'))
			->add('title', TextType::class, array('label' => 'Напишите заголовок'))
			->add('message', TextareaType::class, array('label' => 'Напишите сообщение'))
			->add('save', SubmitType::class, array('label' => 'Отправить'))
		;
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => Message::class,
		));
	}

	public function getBlockPrefix()
	{
		return 'sendmessage';
	}
}