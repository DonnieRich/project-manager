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

## Basic CRUD

Let's start with a simple test: a POST request to a route with a title and a description.
Remember to add `$this->withoutExceptionHandling();` for more explicit errors.

At first the test should look like this:

```php
    $this->withoutExceptionHandling();

    // Arrange
    $project = [
        'title' => 'abc',
        'description' => 'xyz'
    ];

    // Act and Assert
    $this->post('/projects', $project);

    $this->assertDatabaseHas('projects', $project);
```

Let's add the logic directly inside `web.php` (just a temporary measure to better show later how tests allows us to refactor with ease).

```php
Route::post('/projects', function () {
    App\Models\Project::create(request(['title', 'description']));
});

Route::get('/projects', function () {
    $projects = App\Models\Project::all();

    return view('projects.index', compact('projects'));
});
```

Let's create the ProjectFactory and show how to use it:

