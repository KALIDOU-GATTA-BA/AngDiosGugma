<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RadioSponsorship
 *
 * @ORM\Table(name="radio_sponsorship")
 * @ORM\Entity
 */
class RadioSponsorship
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="solicitor", type="string", length=255, nullable=true)
     */
    private $solicitor;

    /**
     * @var int
     *
     * @ORM\Column(name="number_of_week", type="integer", nullable=false)
     */
    private $numberOfWeek;

    /**
     * @var int|null
     *
     * @ORM\Column(name="a1", type="integer", nullable=true)
     */
    private $a1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="a2", type="integer", nullable=true)
     */
    private $a2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="a3", type="integer", nullable=true)
     */
    private $a3;

    /**
     * @var string
     *
     * @ORM\Column(name="rp1_20", type="string", length=255, nullable=false)
     */
    private $rp120;

    /**
     * @var string
     *
     * @ORM\Column(name="ad_name", type="string", length=255, nullable=false)
     */
    private $adName;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", precision=10, scale=0, nullable=false)
     */
    private $amount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ar_diese", type="integer", nullable=true)
     */
    private $arDiese;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ar", type="string", length=255, nullable=true)
     */
    private $ar;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=255, nullable=false)
     */
    private $date;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ad_date_from", type="string", length=255, nullable=true)
     */
    private $adDateFrom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ad_date_to", type="string", length=255, nullable=true)
     */
    private $adDateTo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="renew_date", type="string", length=255, nullable=true)
     */
    private $renewDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contact_number", type="string", length=255, nullable=true)
     */
    private $contactNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="area", type="string", length=255, nullable=true)
     */
    private $area;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSolicitor(): ?string
    {
        return $this->solicitor;
    }

    public function setSolicitor(?string $solicitor): self
    {
        $this->solicitor = $solicitor;

        return $this;
    }

    public function getNumberOfWeek(): ?int
    {
        return $this->numberOfWeek;
    }

    public function setNumberOfWeek(int $numberOfWeek): self
    {
        $this->numberOfWeek = $numberOfWeek;

        return $this;
    }

    public function getA1(): ?int
    {
        return $this->a1;
    }

    public function setA1(?int $a1): self
    {
        $this->a1 = $a1;

        return $this;
    }

    public function getA2(): ?int
    {
        return $this->a2;
    }

    public function setA2(?int $a2): self
    {
        $this->a2 = $a2;

        return $this;
    }

    public function getA3(): ?int
    {
        return $this->a3;
    }

    public function setA3(?int $a3): self
    {
        $this->a3 = $a3;

        return $this;
    }

    public function getRp120(): ?string
    {
        return $this->rp120;
    }

    public function setRp120(string $rp120): self
    {
        $this->rp120 = $rp120;

        return $this;
    }

    public function getAdName(): ?string
    {
        return $this->adName;
    }

    public function setAdName(string $adName): self
    {
        $this->adName = $adName;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getArDiese(): ?int
    {
        return $this->arDiese;
    }

    public function setArDiese(?int $arDiese): self
    {
        $this->arDiese = $arDiese;

        return $this;
    }

    public function getAr(): ?string
    {
        return $this->ar;
    }

    public function setAr(?string $ar): self
    {
        $this->ar = $ar;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAdDateFrom(): ?string
    {
        return $this->adDateFrom;
    }

    public function setAdDateFrom(?string $adDateFrom): self
    {
        $this->adDateFrom = $adDateFrom;

        return $this;
    }

    public function getAdDateTo(): ?string
    {
        return $this->adDateTo;
    }

    public function setAdDateTo(?string $adDateTo): self
    {
        $this->adDateTo = $adDateTo;

        return $this;
    }

    public function getRenewDate(): ?string
    {
        return $this->renewDate;
    }

    public function setRenewDate(?string $renewDate): self
    {
        $this->renewDate = $renewDate;

        return $this;
    }

    public function getContactNumber(): ?string
    {
        return $this->contactNumber;
    }

    public function setContactNumber(?string $contactNumber): self
    {
        $this->contactNumber = $contactNumber;

        return $this;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(?string $area): self
    {
        $this->area = $area;

        return $this;
    }


}
