<?php

namespace Hidenari\ModelSample;

class Person implements PersonInterface
{
    use ValidateNameLength;
    use ValidateOverFifteen;

    public function __construct(
        #[ValidateLength(4, 15)]
        public string $name
        = 'taro' {
            get => 'Mr.'.$this->name;
            set => $this->name = ucwords($value);
        },
        public int $age
        = 15 {
            get => $this->age;
            set => $this->age = $value;
        }
    ) {
        $this->validateNameLength();
        $this->validateOverFifteen();
    }
}
