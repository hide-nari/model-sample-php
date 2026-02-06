<?php

namespace Hidenari\ModelSample\Enum;

use NoDiscard;

enum GradeEnum
{
    case GOLD;
    case SILVER;
    case BRONZE;

    #[NoDiscard]
    public function upGrade(): GradeEnum
    {
        return match ($this) {
            GradeEnum::BRONZE => GradeEnum::SILVER,
            GradeEnum::SILVER => GradeEnum::GOLD,
            default => throw new \InvalidArgumentException('Unexpected Enum value'),
        };
    }

    #[NoDiscard]
    public function downGrade(): GradeEnum
    {
        return match ($this) {
            GradeEnum::GOLD => GradeEnum::SILVER,
            GradeEnum::SILVER => GradeEnum::BRONZE,
            default => throw new \InvalidArgumentException('Unexpected Enum value'),
        };
    }
}
