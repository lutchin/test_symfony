<?php
namespace Messenger\MessageBundle\Entity;

class Message {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $message;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $files;

    /**
     * @var string
     */
    private $uploadFile;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->files = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return Message
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Message
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Add file
     *
     * @param \Messenger\MessageBundle\Entity\File $file
     *
     * @return Message
     */
    public function addFile(\Messenger\MessageBundle\Entity\File $file)
    {
        $this->files[] = $file;

        return $this;
    }

    /**
     * Remove file
     *
     * @param \Messenger\MessageBundle\Entity\File $file
     */
    public function removeFile(\Messenger\MessageBundle\Entity\File $file)
    {
        $this->files->removeElement($file);
    }

    /**
     * Get files
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Set files
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function setFiles()
    {
        return $this->files;
    }

    /**
     * @return string
     */
    public function getUploadFile()
    {
        return $this->uploadFile;
    }

    /**
     * @param string $uploadFile
     */
    public function setUploadFile($uploadFile)
    {
        $this->uploadFile = $uploadFile;
    }


}
