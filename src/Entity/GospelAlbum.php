<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GospelAlbumRepository")
 */
class GospelAlbum
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $admin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getAdmin(): ?string
    {
        return $this->admin;
    }

    public function setAdmin(string $admin): self
    {
        $this->admin = $admin;

        return $this;
    }
}
