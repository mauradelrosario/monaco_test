<?php
namespace App\Entity;

use DateTime;

class Actor
{
    private int $id;
    private string $first_name;
    private string $last_name;
    private DateTime $birth_date;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string 
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function getBirthDate(): DateTime
    {
        return $this->birth_date;
    }

    public function setBirthDate(DateTime $birth_date): self
    {
        $this->birth_date = $birth_date;
        return $this;
    }


}