<?php

namespace Hidenari\ModelSample;

use Hidenari\ModelSample\Enum\GradeEnum;
use Hidenari\ModelSample\Interface\AgeCapsuleInterface;
use Hidenari\ModelSample\Interface\NameCapsuleInterface;
use Hidenari\ModelSample\Validate\ValidateLength;
use Hidenari\ModelSample\Validate\ValidateNameLength;
use Hidenari\ModelSample\Validate\ValidateOverFifteen;
use Override;

class PersonCapsule implements AgeCapsuleInterface, NameCapsuleInterface
{
    use ValidateNameLength;
    use ValidateOverFifteen;

    public function __construct(
        #[ValidateLength(4, 15)]
        private(set) string $name
        = NameCapsuleInterface::INIT_NAME {
            get => 'Mr.'.$this->name;
        },
        private(set) int $age = AgeCapsuleInterface::INIT_AGE,
        private(set) GradeEnum $grade = GradeEnum::BRONZE
    ) {
        $this->validateNameLength();
        $this->validateOverFifteen();
    }

    #[Override]
    public function setName(string $name): void
    {
        $this->name = ucwords($name);
        $this->validateNameLength();
    }

    #[Override]
    public function setAge(int $age): void
    {
        $this->age = $age;
        $this->validateOverFifteen();
    }

    public function setGrade(GradeEnum $grade): void
    {
        $this->grade = $grade;
    }
}
