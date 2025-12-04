<?php

use Hidenari\ModelSample\Person;

test('person model no parameter', function () {
    $person = new Person();
    expect($person->name == 'Mr.Taro')->toBeTrue();
    expect($person->age == 15)->toBeTrue();
});

test('person model with name age parameter', function () {
    $person = new Person('jiro',20);
    expect($person->name == 'Mr.Jiro')->toBeTrue();
    expect($person->age == 20)->toBeTrue();
});
