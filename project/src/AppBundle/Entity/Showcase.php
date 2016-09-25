<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Showcase
 *
 * @ORM\Table(name="swfp_showcase")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShowcaseRepository")
 */
class Showcase
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @var Image[]|ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Image", cascade={"persist"})
     * @ORM\JoinTable(name="swfp_showcase_images",
     *      joinColumns={@ORM\JoinColumn(name="showcase_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id", unique=true)}
     * )
     */
    private $images;


    /**
     * Album constructor.
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    /**
     * Get images
     *
     * @return Image[]|ArrayCollection
     */
    public function getImages()
    {
        return $this->images;
    }
}

