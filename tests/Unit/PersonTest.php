<?php

use Hidenari\ModelSample\Person;

test('person model no parameter', function () {
    $person = new Person;
    expect($person->name === 'Mr.Taro')->toBeTrue()
        ->and($person->name === 'Taro')->toBeFalse()
        ->and($person->name === 'taro')->toBeFalse()
        ->and($person->age === 15)->toBeTrue();

    $person->name = 'jiro';
    expect($person->name === 'Mr.Jiro')->toBeTrue()
        ->and($person->name === 'Mr.Taro')->toBeFalse();

    $person->age = 20;
    expect($person->age === 20)->toBeTrue()
        ->and($person->age === 15)->toBeFalse();
});

test('person model with name,age parameter', function () {
    $person = new Person('jiro', 20);
    expect($person->name === 'Mr.Jiro')->toBeTrue()
        ->and($person->name === 'Jiro')->toBeFalse()
        ->and($person->name === 'jiro')->toBeFalse()
        ->and($person->age === 20)->toBeTrue()
        ->and($person->age === 15)->toBeFalse();
});
