<?php

namespace Hidenari\ModelSample\Validate;

use ReflectionProperty;

trait ValidateNameLength
{
    private function validateNameLength(): void
    {
        $refProperty = new ReflectionProperty($this, 'name');
        $attribute = $refProperty->getAttributes(ValidateLength::class)[0];
        if (mb_strlen($this->name) < $attribute->newInstance()->min
            || mb_strlen($this->name) > $attribute->newInstance()->max
        ) {
            throw new \InvalidArgumentException('Invalid name string');
        }
    }
}
