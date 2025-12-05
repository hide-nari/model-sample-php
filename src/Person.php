<?php

namespace Hidenari\ModelSample;

class Person
{
    public function __construct(
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
    }
}
