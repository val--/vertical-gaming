<?php

namespace GamesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Screenshot
 *
 * @ORM\Table(name="screenshot")
 * @ORM\Entity(repositoryClass="GamesBundle\Repository\ScreenshotRepository")
 */
class Screenshot
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
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="url_caption", type="string", length=255)
     */
    private $urlCaption;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    /**
     * @var bool
     *
     * @ORM\Column(name="isVertical", type="boolean")
     */
    private $isVertical = true;

    /**
    * @ORM\ManyToOne(targetEntity="GamesBundle\Entity\Game", inversedBy="screenshots")
    * @ORM\JoinColumn(nullable=false)
    */
    private $game;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Screenshot
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
     * Set urlCaption
     *
     * @param string $urlCaption
     *
     * @return Screenshot
     */
    public function setUrlCaption($urlCaption)
    {
        $this->urlCaption = $urlCaption;

        return $this;
    }

    /**
     * Get urlCaption
     *
     * @return string
     */
    public function getUrlCaption()
    {
        return $this->urlCaption;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Screenshot
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set isVertical
     *
     * @param boolean $isVertical
     *
     * @return Screenshot
     */
    public function setIsVertical($isVertical)
    {
        $this->isVertical = $isVertical;

        return $this;
    }

    /**
     * Get isVertical
     *
     * @return bool
     */
    public function getIsVertical()
    {
        return $this->isVertical;
    }

    /**
     * Set game
     *
     * @param \GamesBundle\Entity\Game $game
     *
     * @return Screenshot
     */
    public function setGame(\GamesBundle\Entity\Game $game)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \GamesBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }
}
