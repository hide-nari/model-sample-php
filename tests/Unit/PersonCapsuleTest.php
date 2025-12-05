<?php

use Hidenari\ModelSample\PersonCapsule;

test('person capsule model no parameter', function () {
    $person = new PersonCapsule;
    expect($person->name === 'Mr.taro')->toBeTrue();
    expect($person->name === 'taro')->toBeFalse();
    expect($person->age === 15)->toBeTrue();

    $person->setName('jiro');
    expect($person->name === 'Mr.Jiro')->toBeTrue();
    expect($person->name === 'Mr.taro')->toBeFalse();

    $person->setAge(20);
    expect($person->age === 20)->toBeTrue();
    expect($person->age === 15)->toBeFalse();
});

test('person capsule with name age parameter', function () {
    $person = new PersonCapsule('jiro', 20);
    expect($person->name === 'Mr.jiro')->toBeTrue();
    expect($person->name === 'jiro')->toBeFalse();
    expect($person->age === 20)->toBeTrue();
    expect($person->age === 15)->toBeFalse();
});
