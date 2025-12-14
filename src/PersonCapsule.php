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
    public function setName(string $name)
    {
        $this->name = ucwords($name);
    }

    #[\Override]
    public function setAge(int $age)
    {
        $this->age = $age;
    }
}
