<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 05.05.2018
 * Time: 15:21
 */

namespace Messenger\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * File
 *
 * @ORM\Table(name="file")
 *@ORM\Entity
 */
class File
{
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string")
	 *
	 * @Assert\NotBlank
	 * @Assert\File(mimeTypes={ "application/pdf" })
	 */
	private $file;


	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getFile()
	{
		return $this->file;
	}

	/**
	 * @param mixed $file
	 */
	public function setFile($file)
	{
		$this->file = $file;
	}

	public function __toString()
	{
		return $this->getFile();
	}


}