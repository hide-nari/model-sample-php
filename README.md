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

## Update Rules

When updating, execute the following command.

```
./vendor/bin/pint
./vendor/bin/pest
herd coverage ./vendor/bin/pest --coverage
```

## License

This utility is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).