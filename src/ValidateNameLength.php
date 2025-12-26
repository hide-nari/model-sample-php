<?php

namespace Hidenari\ModelSample;

use ReflectionProperty;

trait ValidateNameLength
{
    private function validateNameLength(): void
    {
        $refProperty = new ReflectionProperty(__CLASS__, 'name');
        $attributes = $refProperty->getAttributes(ValidateLength::class);
        foreach ($attributes as $attribute) {
            if (mb_strlen($this->name) < $attribute->newInstance()->min
                || mb_strlen($this->name) > $attribute->newInstance()->max
            ) {
                throw new \InvalidArgumentException('Invalid name string');
            }
        }
    }
}
