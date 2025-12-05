<?php

use Hidenari\ModelSample\Person;

test('person model no parameter', function () {
    $person = new Person;
    expect($person->name === 'Mr.Taro')->toBeTrue();
    expect($person->name === 'Taro')->toBeFalse();
    expect($person->name === 'taro')->toBeFalse();
    expect($person->age === 15)->toBeTrue();

    $person->name = 'jiro';
    expect($person->name === 'Mr.Jiro')->toBeTrue();
    expect($person->name === 'Mr.Taro')->toBeFalse();

    $person->age = 20;
    expect($person->age === 20)->toBeTrue();
    expect($person->age === 15)->toBeFalse();
});

test('person model with name,age parameter', function () {
    $person = new Person('jiro', 20);
    expect($person->name === 'Mr.Jiro')->toBeTrue();
    expect($person->name === 'Jiro')->toBeFalse();
    expect($person->name === 'jiro')->toBeFalse();
    expect($person->age === 20)->toBeTrue();
});
