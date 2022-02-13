<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;

class Registration
{
    private string $name;
    private Email $email;
    private Cpf $registrationNumber;
    private \DateTimeInterface $dateOfRegistration;
    private \DateTimeInterface $registrationAt;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function setEmail(Email $email)
    {

        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setRegistrationNumber(Cpf $number)
    {
        $this->registrationNumber = $number;

        return $this;
    }

    public function getRegistrationNumber()
    {
        return $this->registrationNumber;
    }


    /**
     * Get the value of dateOfRegistration
     *
     * @return  \DateTimeInterface
     */
    public function getDateOfRegistration()
    {
        return $this->dateOfRegistration;
    }

    /**
     * Set the value of dateOfRegistration
     *
     * @param  \DateTimeInterface  $dateOfRegistration
     *
     * @return  self
     */
    public function setDateOfRegistration(\DateTimeInterface $dateOfRegistration)
    {
        $this->dateOfRegistration = $dateOfRegistration;

        return $this;
    }

    /**
     * Get the value of registrationAt
     *
     * @return  \DateTimeInterface
     */
    public function getRegistrationAt()
    {
        return $this->registrationAt;
    }

    /**
     * Set the value of registrationAt
     *
     * @param  \DateTimeInterface  $registrationAt
     *
     * @return  self
     */
    public function setRegistrationAt(\DateTimeInterface $registrationAt)
    {
        $this->registrationAt = $registrationAt;

        return $this;
    }
}
