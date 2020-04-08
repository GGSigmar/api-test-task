<?php

namespace App\Entity;

use Ramsey\Uuid\Uuid;

class Currency
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $code;

    /**
     * @var float
     */
    private $rate;

    /**
     * @param string $name
     * @param string $code
     * @param float $rate
     */
    public function __construct(
        string $name,
        string $code,
        float $rate
    ) {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->code = $code;
        $this->rate = $rate;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     */
    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }
}