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
* Message
*
* @ORM\Table(name="message")
* @ORM\Entity
*/

class Message
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
	 * @var string
	 * @Assert\NotBlank
	 * @ORM\Column(name="message", type="string", length=255)
	 */
	private $message;

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
	 * @return string
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * @param string $message
	 */
	public function setMessage($message)
	{
		$this->message = $message;
	}

	public function __toString()
	{
		return $this->getMessage();
	}

}