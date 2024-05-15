<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(length: 255)]
    private ?string $numberMercantil = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pdfMercantil = null;

    #[ORM\Column(length: 255)]
    private ?string $representLegal = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 20)]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $numberWorkers = null;

    #[ORM\Column(length: 255)]
    private ?string $whatsapp = null;

    #[ORM\ManyToOne(inversedBy: 'companies')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getNumberMercantil(): ?string
    {
        return $this->numberMercantil;
    }

    public function setNumberMercantil(string $numberMercantil): static
    {
        $this->numberMercantil = $numberMercantil;

        return $this;
    }

    public function getPdfMercantil(): ?string
    {
        return $this->pdfMercantil;
    }

    public function setPdfMercantil(string $pdfMercantil): static
    {
        $this->pdfMercantil = $pdfMercantil;

        return $this;
    }

    public function getRepresentLegal(): ?string
    {
        return $this->representLegal;
    }

    public function setRepresentLegal(string $representLegal): static
    {
        $this->representLegal = $representLegal;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getNumberWorkers(): ?string
    {
        return $this->numberWorkers;
    }

    public function setNumberWorkers(string $numberWorkers): static
    {
        $this->numberWorkers = $numberWorkers;

        return $this;
    }

    public function getWhatsapp(): ?string
    {
        return $this->whatsapp;
    }

    public function setWhatsapp(string $whatsapp): static
    {
        $this->whatsapp = $whatsapp;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
