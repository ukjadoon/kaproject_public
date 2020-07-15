<?php

namespace App\Helpers;

class PostalCode
{
    protected $postalCode;

    public function __construct(string $postalCode)
    {
        $this->postalCode = $this->formatAndSetPostalCode($postalCode);
    }

    private function formatAndSetPostalCode(string $postalCode)
    {
        $postalCode = str_replace(' ', '', $postalCode);

        return (int) $postalCode;
    }

    public function getPostalCode(): int
    {
        return $this->postalCode;
    }

    public function getGeographicalArea(): string
    {
        switch(true) {
            case($this->postalCode >= 12000 && $this->postalCode < 16000):

                return 'Södra Storstockholm';
            case($this->postalCode >= 16000 && $this->postalCode < 20000):

                return 'Norra Storstockholm';
            case($this->postalCode >= 23000 && $this->postalCode < 24000):

                return 'Sydvästra Skåne län';
            default:
                
                return 'N/A';
        }
    }
}
