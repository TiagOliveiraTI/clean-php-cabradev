<?php

declare (strict_types=1);

namespace App\UseCases\ExportRegistration;

class OutputBoundary
{
    private string $name;
    private string $email;
    private string $registrationNumber;
    private \DateTimeInterface $dateOfRegistration;
    private \DateTimeInterface $registrationAt;

    public function __construct(array $values)
    {
        $this->name = $values['name'] ?? '';
        $this->email = $values['email'] ?? '';
        $this->registrationNumber = $values['registrationNumber'] ?? '';
        $this->dateOfRegistration = $values['dateOfRegistration'] ?? '';
        $this->registrationAt = $values['registrationAt'] ?? '';
    }

    /**
     * Get the value of name
     *
     * @return  string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of registrationNumber
     *
     * @return  string
     */
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
     * Get the value of registrationAt
     *
     * @return  \DateTimeInterface
     */
    public function getRegistrationAt()
    {
        return $this->registrationAt;
    }
}
