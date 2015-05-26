<?php

namespace DigixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TagDB
 * @ORM\Entity
 */
class TagDB
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $tagList;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $type;
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
     * Set url
     *
     * @param string $url
     * @return TagDB
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set tagList
     *
     * @param string $tagList
     * @return TagDB
     */
    public function setTagList($tagList)
    {
        $this->tagList = $tagList;

        return $this;
    }

    /**
     * Get tagList
     *
     * @return string 
     */
    public function getTagList()
    {
        return $this->tagList;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return TagDB
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
