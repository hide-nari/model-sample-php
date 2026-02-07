<?php

use Hidenari\ModelSample\Enum\GradeEnum;
use Hidenari\ModelSample\PersonCapsule;

test('person capsule model no parameter', function () {
    $person = new PersonCapsule;
    expect($person->name === 'Mr.Taro')->toBeTrue()
        ->and($person->name === 'Taro')->toBeFalse()
        ->and($person->name === 'taro')->toBeFalse()
        ->and($person->age === 15)->toBeTrue()
        ->and($person->grade === GradeEnum::BRONZE)->toBeTrue();

    $person->setName('jiro');
    expect($person->name === 'Mr.Jiro')->toBeTrue()
        ->and($person->name === 'Mr.taro')->toBeFalse();

    $person->setAge(20);
    expect($person->age === 20)->toBeTrue()
        ->and($person->age === 15)->toBeFalse();

    $person->setGrade(GradeEnum::SILVER);
    expect($person->grade === GradeEnum::SILVER)->toBeTrue()
        ->and($person->grade === GradeEnum::BRONZE)->toBeFalse()
        ->and($person->grade === GradeEnum::GOLD)->toBeFalse();

    $person->setGrade(GradeEnum::GOLD);
    expect($person->grade === GradeEnum::GOLD)->toBeTrue()
        ->and($person->grade === GradeEnum::BRONZE)->toBeFalse()
        ->and($person->grade === GradeEnum::SILVER)->toBeFalse();
});

test('person capsule model no parameter with name set error', function () {
    $person = new PersonCapsule;
    $person->name = 'jiro';
})->throws(Error::class);

test('person capsule model no parameter with age set error', function () {
    $person = new PersonCapsule;
    $person->age = 15;
})->throws(Error::class);

test('person capsule model no parameter with grade set error', function () {
    $person = new PersonCapsule;
    $person->grade = GradeEnum::BRONZE;
})->throws(Error::class);

test('person capsule model with name age parameter', function () {
    $person = new PersonCapsule('jiro', 20, GradeEnum::BRONZE);
    expect($person->name === 'Mr.Jiro')->toBeTrue()
        ->and($person->name === 'Jiro')->toBeFalse()
        ->and($person->name === 'jiro')->toBeFalse()
        ->and($person->age === 20)->toBeTrue()
        ->and($person->age === 15)->toBeFalse()
        ->and($person->grade === GradeEnum::BRONZE)->toBeTrue()
        ->and($person->grade === GradeEnum::SILVER)->toBeFalse()
        ->and($person->grade === GradeEnum::GOLD)->toBeFalse();
});

test('person capsule model with kanji name,age,grade parameter', function () {
    $person = new PersonCapsule('原', 20, GradeEnum::BRONZE);
    expect($person->name === 'Mr.原')->toBeTrue()
        ->and($person->age === 20)->toBeTrue()
        ->and($person->grade === GradeEnum::BRONZE)->toBeTrue();
});

test('person capsule model with name min length parameter', function () {
    new PersonCapsule('', 20, GradeEnum::BRONZE);
})->throws(\InvalidArgumentException::class, 'Invalid name string');

test('person capsule model with name over length parameter', function () {
    new PersonCapsule('1234567890123', 20, GradeEnum::BRONZE);
})->throws(\InvalidArgumentException::class, 'Invalid name string');

test('person capsule model with age under 15 parameter', function () {
    new PersonCapsule('taro', 14, GradeEnum::BRONZE);
})->throws(\InvalidArgumentException::class, 'under fifteen');

test('person capsule model with grade error parameter', function () {
    new PersonCapsule('taro', 15, 'bronze');
})->throws(Error::class);
