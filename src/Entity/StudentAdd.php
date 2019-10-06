<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentAddRepository")
 */
class StudentAdd
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
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $LastName;
   

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $BirthDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Address;

    /**
     * @ORM\Column(type="integer")
     */
    private $Age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $representative;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ADGWorkerOrIndigent;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $contactNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $Grade;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getBirthDate():  ?string
    {
        return $this->BirthDate;
    }

    public function setBirthDate(string $BirthDate): self
    {
        $this->BirthDate = $BirthDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(int $Age): self
    {
        $this->Age = $Age;

        return $this;
    }

    public function getRepresentative(): ?string
    {
        return $this->representative;
    }

    public function setRepresentative(string $representative): self
    {
        $this->representative = $representative;

        return $this;
    }

    public function getADGWorkerOrIndigent(): ?string
    {
        return $this->ADGWorkerOrIndigent;
    }

    public function setADGWorkerOrIndigent(?string $ADGWorkerOrIndigent): self
    {
        $this->ADGWorkerOrIndigent = $ADGWorkerOrIndigent;

        return $this;
    }

    public function getContactNumber(): ?int
    {
        return $this->contactNumber;
    }

    public function setContactNumber(?int $contactNumber): self
    {
        $this->contactNumber = $contactNumber;

        return $this;
    }

    public function getGrade(): ?int
    {
        return $this->Grade;
    }

    public function setGrade(int $Grade): self
    {
        $this->Grade = $Grade;

        return $this;
    }
}
