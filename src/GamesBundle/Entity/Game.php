<?php

namespace GamesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="GamesBundle\Repository\GameRepository")
 */
class Game
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="why", type="string", length=255)
     */
    private $why;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRelease", type="datetime", nullable=true)
     */
    private $dateRelease;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAdd", type="datetime")
     */
    private $dateAdd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEdit", type="datetime")
     */
    private $dateEdit;

    /**
     * @var bool
     *
     * @ORM\Column(name="isValid", type="boolean")
     */
    private $isValid = true;

    /**
     * @var int
     *
     * @ORM\Column(name="nbRecommendations", type="integer")
     */
    private $nbRecommendations = 0;

    /**
    * @ORM\ManyToOne(targetEntity="GamesBundle\Entity\Platform", inversedBy="games", cascade={"persist"})
    */
    private $platform;

    /**
    * @ORM\ManyToOne(targetEntity="GamesBundle\Entity\Type", inversedBy="games", cascade={"persist"})
    */
    private $type;

    /**
    * @ORM\OneToMany(targetEntity="GamesBundle\Entity\Screenshot", mappedBy="game")
    */
    private $screenshots;

    public function __construct()
    {
        $this->dateRelease    = new \Datetime();
        $this->dateAdd        = new \Datetime();
        $this->dateEdit       = new \Datetime();
        $this->screenshots    = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Game
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Game
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set why
     *
     * @param string $why
     *
     * @return Game
     */
    public function setWhy($why)
    {
        $this->why = $why;

        return $this;
    }

    /**
     * Get why
     *
     * @return string
     */
    public function getWhy()
    {
        return $this->why;
    }

    /**
     * Set dateRelease
     *
     * @param \DateTime $dateRelease
     *
     * @return Game
     */
    public function setDateRelease($dateRelease = null)
    {
        $this->dateRelease = $dateRelease;

        return $this;
    }

    /**
     * Get dateRelease
     *
     * @return \DateTime
     */
    public function getDateRelease()
    {
        return $this->dateRelease;
    }

    /**
     * Set dateAdd
     *
     * @param \DateTime $dateAdd
     *
     * @return Game
     */
    public function setDateAdd($dateAdd = null)
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    /**
     * Get dateAdd
     *
     * @return \DateTime
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    /**
     * Set dateEdit
     *
     * @param \DateTime $dateEdit
     *
     * @return Game
     */
    public function setDateEdit($dateEdit = null)
    {
        $this->dateEdit = $dateEdit;

        return $this;
    }

    /**
     * Get dateEdit
     *
     * @return \DateTime
     */
    public function getDateEdit()
    {
        return $this->dateEdit;
    }

    /**
     * Set isValid
     *
     * @param boolean $isValid
     *
     * @return Game
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;

        return $this;
    }

    /**
     * Get isValid
     *
     * @return bool
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * Set nbRecommendations
     *
     * @param integer $nbRecommendations
     *
     * @return Game
     */
    public function setNbRecommendations($nbRecommendations)
    {
        $this->nbRecommendations = $nbRecommendations;

        return $this;
    }

    /**
     * Get nbRecommendations
     *
     * @return int
     */
    public function getNbRecommendations()
    {
        return $this->nbRecommendations;
    }

    /**
     * Set type
     *
     * @param \GamesBundle\Entity\Type $type
     *
     * @return Game
     */
    public function setType(\GamesBundle\Entity\Type $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \GamesBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add screenshot
     *
     * @param \GamesBundle\Entity\Screenshot $screenshot
     *
     * @return Game
     */
    public function addScreenshot(\GamesBundle\Entity\Screenshot $screenshot)
    {
        $this->screenshots[] = $screenshot;
        $screenshot->setGame($this);
        return $this;
    }

    /**
     * Remove screenshot
     *
     * @param \GamesBundle\Entity\Screenshot $screenshot
     */
    public function removeScreenshot(\GamesBundle\Entity\Screenshot $screenshot)
    {
        $this->screenshots->removeElement($screenshot);
    }

    /**
     * Get screenshots
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getScreenshots()
    {
        return $this->screenshots;
    }

    /**
     * Set platform
     *
     * @param \GamesBundle\Entity\Platform $platform
     *
     * @return Game
     */
    public function setPlatform(\GamesBundle\Entity\Platform $platform = null)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform
     *
     * @return \GamesBundle\Entity\Platform
     */
    public function getPlatform()
    {
        return $this->platform;
    }
}
