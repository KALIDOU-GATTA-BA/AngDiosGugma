<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommunityIncRepository")
 */
class CommunityInc
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $AddArticleComInc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    public function getId(): ?int
    {           
        return $this->id;
    }

    public function getAddArticleComInc(): ?string
    {
        return $this->AddArticleComInc;
    }

    public function setAddArticleComInc(?string $AddArticleComInc): self
    {
        $this->AddArticleComInc = $AddArticleComInc;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
