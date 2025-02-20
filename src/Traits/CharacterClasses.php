<?php

declare(strict_types=1);

namespace VincentVanWijk\FluentRegex\Traits;

trait CharacterClasses
{
    public function exactly(string $exactly): static
    {
        $this->addToRegex($this->escape($exactly));

        return $this;
    }

    public function anyCharacterOf(...$characters): static
    {
        $this->addToRegex($this->not ? '[^' : '[');

        foreach ($characters as $char) {
            $this->addToRegex($this->escape($char));
        }

        $this->addToRegex(']');

        return $this;
    }

    public function letter(): static
    {
        $this->addToRegex($this->not ? '[^a-zA-Z]' : '[a-zA-Z]');

        return $this;
    }

    public function lowerCaseLetter(): static
    {
        $this->addToRegex($this->not ? '[^a-z]' : '[a-z]');

        return $this;
    }

    public function upperCaseLetter(): static
    {
        $this->addToRegex($this->not ? '[^A-Z]' : '[A-Z]');

        return $this;
    }

    public function digit(): static
    {
        $this->addToRegex($this->not ? '[^0-9]' : '[0-9]');

        return $this;
    }

    public function alphaNumeric(): static
    {
        $this->addToRegex($this->not ? '[^a-zA-Z0-9]' : '[a-zA-Z0-9]');

        return $this;
    }
}
