<?php
namespace App\Entity;

class Cinema
{
    private ?int $id = null;
    private string $name = '';
    private string $city = '';
    private string $numberStreet = '';
    private string $codePost = '';
    private ?int $operatorId = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getcity(): string
    {
        return $this->city;
    }

    public function setcity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getNumberStreet(): string
    {
        return $this->numberStreet;
    }

    public function setNumberStreet(string $numberStreet): self
    {
        $this->numberStreet = $numberStreet;
        return $this;
    }

    public function getCodePost(): string
    {
        return $this->codePost;
    }

    public function setCodePost(string $codePost): self
    {
        $this->codePost = $codePost;
        return $this;
    }

    public function getOperatorId(): int
    {
        return $this->operatorId;
    }

    public function setOperatorId(int $operatorId): self
    {
        $this->operatorId = $operatorId;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'city' => $this->city,
            'number_street' => $this->numberStreet,
            'code_post' => $this->codePost,
            'operator_id' => $this->operatorId
        ];
    }
}