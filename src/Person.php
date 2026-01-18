<?php

namespace Hidenari\ModelSample;

use Hidenari\ModelSample\Interface\AgeInterface;
use Hidenari\ModelSample\Interface\NameInterface;
use Hidenari\ModelSample\Validate\ValidateLength;
use Hidenari\ModelSample\Validate\ValidateNameLength;
use Hidenari\ModelSample\Validate\ValidateOverFifteen;

class Person implements AgeInterface, NameInterface
{
    use ValidateNameLength;
    use ValidateOverFifteen;

    public function __construct(
        #[ValidateLength(4, 15)]
        public string $name
        = NameInterface::INIT_NAME {
            get => 'Mr.'.$this->name;
            set => $this->name = ucwords($value);
        },
        public int $age
        = AgeInterface::INIT_AGE {
            get => $this->age;
            set => $this->age = $value;
        }
    ) {
        $this->validateNameLength();
        $this->validateOverFifteen();
    }
}
