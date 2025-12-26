<?php

use Hidenari\ModelSample\PersonCapsule;

test('person capsule model no parameter', function () {
    $person = new PersonCapsule;
    expect($person->name === 'Mr.taro')->toBeTrue()
        ->and($person->name === 'Taro')->toBeFalse()
        ->and($person->name === 'taro')->toBeFalse()
        ->and($person->age === 15)->toBeTrue();

    $person->setName('jiro');
    expect($person->name === 'Mr.Jiro')->toBeTrue()
        ->and($person->name === 'Mr.taro')->toBeFalse();

    $person->setAge(20);
    expect($person->age === 20)->toBeTrue()
        ->and($person->age === 15)->toBeFalse();
});

test('person capsule model no parameter with name set error', function () {
    $person = new PersonCapsule;
    $person->name = 'jiro';
})->throws(Error::class);

test('person capsule model no parameter with age set error', function () {
    $person = new PersonCapsule;
    $person->age = 15;
})->throws(Error::class);

test('person capsule with name age parameter', function () {
    $person = new PersonCapsule('jiro', 20);
    expect($person->name === 'Mr.jiro')->toBeTrue()
        ->and($person->name === 'Jiro')->toBeFalse()
        ->and($person->name === 'jiro')->toBeFalse()
        ->and($person->age === 20)->toBeTrue()
        ->and($person->age === 15)->toBeFalse();
});

test('person model with kanji name,age parameter', function () {
    $person = new PersonCapsule('原', 20);
    expect($person->name === 'Mr.原')->toBeTrue()
        ->and($person->age === 20)->toBeTrue();
});

test('person model with name min length parameter', function () {
    new PersonCapsule('', 20);
})->throws(\InvalidArgumentException::class, 'Invalid name string');

test('person model with name over length parameter', function () {
    new PersonCapsule('1234567890123', 20);
})->throws(\InvalidArgumentException::class, 'Invalid name string');

test('person model with age under 15 parameter', function () {
    new PersonCapsule('taro', 14);
})->throws(\InvalidArgumentException::class, 'under fifteen');
