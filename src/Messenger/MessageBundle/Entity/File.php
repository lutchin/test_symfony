<?php
namespace Messenger\MessageBundle\Entity;

class File {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var array
     */
    private $file = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $message;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->message = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set file
     *
     * @param array $file
     *
     * @return File
     */
    public function setFile(array $file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return array
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Add message
     *
     * @param \Messenger\MessageBundle\Entity\Message $message
     *
     * @return File
     */
    public function addMessage(\Messenger\MessageBundle\Entity\Message $message)
    {
        $this->message[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param \Messenger\MessageBundle\Entity\Message $message
     */
    public function removeMessage(\Messenger\MessageBundle\Entity\Message $message)
    {
        $this->message->removeElement($message);
    }

    /**
     * Get message
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessage()
    {
        return $this->message;
    }
}
