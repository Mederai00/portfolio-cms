<?php

namespace App\Entity;

use App\Repository\BlockRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlockRepository::class)
 */
class Block
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $titre;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $button;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $poucentage;
    

    /**
     * @ORM\ManyToOne(targetEntity=Section::class, inversedBy="blocks")
     */
    private $section;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getButton()
    {
        return $this->button;
    }

    /**
     * @param mixed $button
     */
    public function setButton($button): void
    {
        $this->button = $button;
    }

    /**
     * @return mixed
     */
    public function getPoucentage()
    {
        return $this->poucentage;
    }

    /**
     * @param mixed $poucentage
     */
    public function setPoucentage($poucentage): void
    {
        $this->poucentage = $poucentage;
    }


    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;

        return $this;
    }
    
    public function __toString()
    {
        return $this->getTitre();
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }
}
