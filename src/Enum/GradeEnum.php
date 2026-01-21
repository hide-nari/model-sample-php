<?php

namespace Hidenari\ModelSample\Enum;

enum GradeEnum: int
{
    case GOLD = 3;
    case SILVER = 2;
    case BRONZE = 1;

    public function upGrade($grade)
    {
        return match ($grade) {
            GradeEnum::BRONZE => GradeEnum::SILVER,
            GradeEnum::SILVER => GradeEnum::GOLD,
            default => throw new \InvalidArgumentException('Unexpected Enum value'),
        };
    }

    public function downGrade($grade)
    {
        return match ($grade) {
            GradeEnum::GOLD => GradeEnum::SILVER,
            GradeEnum::SILVER => GradeEnum::BRONZE,
            default => throw new \InvalidArgumentException('Unexpected Enum value'),
        };
    }
}
