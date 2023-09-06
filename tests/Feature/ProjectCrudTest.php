<?php

use App\Models\Project;

it('allows a user to create a project', function () {

    $this->withoutExceptionHandling();

    // Arrange
    $project = Project::factory()->raw();

    // Act and Assert
    $this->post('/projects', $project)->assertRedirect('/projects');

    $this->assertDatabaseHas('projects', $project);

    $this->get('/projects')->assertSee($project['title']);
});

it('show an error if the project does not have a title', function () {

    $project_attributes = Project::factory()->raw([
        'title' => ''
    ]);

    // Act and Assert
    $this->post('/projects', $project_attributes)->assertSessionHasErrors('title');
});

it('show an error if the project does not have a description', function () {

    $project_attributes = Project::factory()->raw([
        'description' => ''
    ]);

    // Act and Assert
    $this->post('/projects', $project_attributes)->assertSessionHasErrors('description');
});
