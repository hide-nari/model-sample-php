<?php

namespace Hidenari\ModelSample;

interface PersonCapsuleInterface
{
    public string $name {
        get;
    }

    public int $age {
        get;
    }

    public function setName(string $name): void;

    public function setAge(int $age): void;
}
