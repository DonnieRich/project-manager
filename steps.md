# Steps and ToDos

## Initial configuration

* Install a new Laravel Project
* [Install Pest](https://pestphp.com/docs/installation)
    * Initial command: `composer require pestphp/pest --dev --with-all-dependencies`
    * Plugin: `composer require pestphp/pest-plugin-laravel --dev`
    * Final installation: `php artisan pest:install`
* Define a snippet:
    * VSCode -> File -> Preferences -> Configure User Snippets -> New Global Snippet
```json
{
    "Pest test": {
        "prefix": [
            "test",
            "pest test"
        ],
        "scope": "php",
        "body": [
            "it('$0', function() {",
            "   // Arrange",
            "   ",
            "   // Act",
            "   ",
            "   // Assert",
            "});"
        ]
    }
}
```
* Remove comments for database in phpunit.xml file:
```xlm
<env name="DB_CONNECTION" value="sqlite"/>
<env name="DB_DATABASE" value=":memory:"/>
```
* Install plugin for VSCode: [Better Pest](https://marketplace.visualstudio.com/items?itemName=m1guelpf.better-pest)