<?php

namespace App\Entity;

use App\Repository\MobileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MobileRepository::class)]
class Mobile {
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 50)]
  private ?string $name = null;

  #[ORM\Column(length: 50)]
  private ?string $brand = null;

  #[ORM\Column]
  private ?int $price = null;

  #[ORM\Column]
  private ?int $frontCamera = null;

  #[ORM\Column]
  private ?int $backCamera = null;

  #[ORM\Column]
  private ?int $battery = null;

  #[ORM\Column]
  private ?int $ram = null;

  #[ORM\Column]
  private ?int $storage = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function setId(int $id): static
  {
    $this->id = $id;

    return $this;
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

  public function getBrand(): ?string
  {
    return $this->brand;
  }

  public function setBrand(string $brand): static
  {
    $this->brand = $brand;

    return $this;
  }

  public function getPrice(): ?int
  {
    return $this->price;
  }

  public function setPrice(int $price): static
  {
    $this->price = $price;

    return $this;
  }

  public function getFrontCamera(): ?int
  {
    return $this->frontCamera;
  }

  public function setFrontCamera(int $frontCamera): static
  {
    $this->frontCamera = $frontCamera;

    return $this;
  }

  public function getBackCamera(): ?int
  {
    return $this->backCamera;
  }

  public function setBackCamera(int $backCamera): static
  {
    $this->backCamera = $backCamera;

    return $this;
  }

  public function getBattery(): ?int
  {
    return $this->battery;
  }

  public function setBattery(int $battery): static
  {
    $this->battery = $battery;

    return $this;
  }

  public function getRam(): ?int
  {
    return $this->ram;
  }

  public function setRam(int $ram): static
  {
    $this->ram = $ram;

    return $this;
  }

  public function getStorage(): ?int
  {
    return $this->storage;
  }

  public function setStorage(int $storage): static
  {
    $this->storage = $storage;

    return $this;
  }
}
