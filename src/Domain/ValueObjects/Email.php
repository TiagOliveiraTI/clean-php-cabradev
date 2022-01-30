<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;

class Email
{
    public function __construct(public ?string $email)
    {
        if (is_null($email)) {
            throw new DomainException('Email is required');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new DomainException('Invalid email');
        }
        $this->email = $email;
    }

    public function email(): string {
        return $this->email;
    }
    
}