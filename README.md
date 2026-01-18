Person Model Sample on php version 8.4 or later.

## about this package

Person Model

- public name
- public age

Person Capsule Model

- public private(set) name
- public private(set) age
- public setName()
- public setAge()

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