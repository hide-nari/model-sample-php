Person Model Sample on php version 8.4 or later.

## About this package
Person Model two programming pattern.

- public name
- public age
- public grade

Person Capsule Model

- public private(set) name
- public private(set) age
- public setName()
- public setAge()

## Bind Check
Model bind check with attribute
- name(4 to 15 length with added [Mr.] include)

Model bind check with trait
- age(over 15)

## Update Rules

When updating, execute the following command.

```
herd coverage ./vendor/bin/pest --coverage
./vendor/bin/pest
./vendor/bin/pint
./vendor/bin/phpstan analyse src --level=10
```

## License

This utility is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).