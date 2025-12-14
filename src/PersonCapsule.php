<?php

namespace Hidenari\ModelSample;

class PersonCapsule implements PersonCapsuleInterface
{
    public function __construct(
        private(set) string $name
        = 'taro' {
            get => 'Mr.'.$this->name;
        },
        private(set) int $age
        = 15 {
            get => $this->age;
        }
    ) {
    }

    #[\Override]
    public function setName(string $name): void
    {
        $this->name = ucwords($name);
    }

    #[\Override]
    public function setAge(int $age): void
    {
        $this->age = $age;
    }
}
