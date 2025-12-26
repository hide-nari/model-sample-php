<?php

namespace Hidenari\ModelSample;

use Override;

class PersonCapsule implements PersonCapsuleInterface
{
    use ValidateNameLength;
    use ValidateOverFifteen;

    public function __construct(
        #[ValidateLength(4, 15)]
        private(set) string $name
        = 'taro' {
            get => 'Mr.'.$this->name;
        },
        private(set) int $age
        = 15 {
            get => $this->age;
        }
    ) {
        $this->validateNameLength();
        $this->validateOverFifteen();
    }

    #[Override]
    public function setName(string $name): void
    {
        $this->name = ucwords($name);
    }

    #[Override]
    public function setAge(int $age): void
    {
        $this->age = $age;
    }
}
