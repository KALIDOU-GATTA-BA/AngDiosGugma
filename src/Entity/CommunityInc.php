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
}
