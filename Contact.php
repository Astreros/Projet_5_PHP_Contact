<?php

declare(strict_types=1);

class Contact
{
    public function __construct(private ?int $id, private string $name, private string $email, private string $phoneNumber)
    {
    }

    private function setId($id): void
    {
        $this->id = $id;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setPhoneNumber($phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function __toString(): string
    {
        return "N°{$this->id }: {$this->name}";
    }
}