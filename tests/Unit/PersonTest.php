<?php

use Hidenari\ModelSample\Enum\GradeEnum;
use Hidenari\ModelSample\Person;

test('person model no parameter', function () {
    $person = new Person;
    expect($person->name === 'Mr.Taro')->toBeTrue()
        ->and($person->name === 'Taro')->toBeFalse()
        ->and($person->name === 'taro')->toBeFalse()
        ->and($person->age === 15)->toBeTrue()
        ->and($person->grade === GradeEnum::BRONZE)->toBeTrue()
        ->and($person->grade->value === 1)->toBeTrue();

    $person->name = 'jiro';
    expect($person->name === 'Mr.Jiro')->toBeTrue()
        ->and($person->name === 'Mr.Taro')->toBeFalse();

    $person->age = 20;
    expect($person->age === 20)->toBeTrue()
        ->and($person->age === 15)->toBeFalse();

    $person->grade = GradeEnum::SILVER;
    expect($person->grade === GradeEnum::SILVER)->toBeTrue()
        ->and($person->grade->value === 2)->toBeTrue()
        ->and($person->grade->value === 1)->toBeFalse();

    $person->grade = GradeEnum::GOLD;
    expect($person->grade === GradeEnum::GOLD)->toBeTrue()
        ->and($person->grade->value === 3)->toBeTrue()
        ->and($person->grade->value === 2)->toBeFalse();
});

test('person model with name,age parameter', function () {
    $person = new Person('jiro', 20, GradeEnum::BRONZE);
    expect($person->name === 'Mr.Jiro')->toBeTrue()
        ->and($person->name === 'Jiro')->toBeFalse()
        ->and($person->name === 'jiro')->toBeFalse()
        ->and($person->age === 20)->toBeTrue()
        ->and($person->age === 15)->toBeFalse()
        ->and($person->grade === GradeEnum::BRONZE)->toBeTrue()
        ->and($person->grade->value === 1)->toBeTrue()
        ->and($person->grade === GradeEnum::SILVER)->toBeFalse()
        ->and($person->grade->value === 2)->toBeFalse()
        ->and($person->grade === GradeEnum::GOLD)->toBeFalse()
        ->and($person->grade->value === 3)->toBeFalse();
});

test('person model with kanji name,age parameter', function () {
    $person = new Person('原', 20);
    expect($person->name === 'Mr.原')->toBeTrue()
        ->and($person->age === 20)->toBeTrue();
});

test('person model with name min length parameter', function () {
    new Person('', 20);
})->throws(InvalidArgumentException::class, 'Invalid name string');

test('person model with name over length parameter', function () {
    new Person('1234567890123', 20);
})->throws(InvalidArgumentException::class, 'Invalid name string');

test('person model with age under 15 parameter', function () {
    new Person('taro', 14);
})->throws(InvalidArgumentException::class, 'under fifteen');
