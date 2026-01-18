<?php

namespace Hidenari\ModelSample\Validate;

trait ValidateOverFifteen
{
    private function validateOverFifteen(): void
    {
        $this->age < 15 && throw new \InvalidArgumentException('under fifteen');
    }
}
