<?php declare(strict_types=1);

namespace Coalition\Exam;

class Skill
{
    private array $properties = [];

    //Handles undefined methods.
    public function __call(string $name, array $arguments): bool
    {
        if (str_starts_with($name, 'has_')) {
            return true;
        }
        return false;
    }

    //Handles undefined properties.
    public function __get(string $name)
    {
        if (str_ends_with($name, '_CT')) {
            return md5($name);
        }
        return $this->properties[$name] ?? null;
    }

    //Sets property values.
    public function __set(string $name, $value): void
    {
        $this->properties[$name] = $value;
    }

    //Converts object to string.
    public function __toString(): string
    {
        return 'This is a Skill object containing CT';
    }

    //Allows the object to be used as a function.
    public function __invoke(array $numbers): int
    {
        return array_sum($numbers);
    }
}
