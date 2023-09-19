<?php

use App\Models\Project;

it('allows a user to create a project', function () {

    $this->withoutExceptionHandling();

    // Arrange
    $project = Project::factory()->raw();

    // Act and Assert
    $this->post(route('projects.store'), $project)->assertRedirect(route('projects.index'));

    $this->assertDatabaseHas('projects', $project);

    $this->get(route('projects.index'))->assertSee($project['title']);
});

it('show an error if the project does not have a title', function () {

    $project_attributes = Project::factory()->raw([
        'title' => ''
    ]);

    // Act and Assert
    $this->post(route('projects.store'), $project_attributes)->assertSessionHasErrors('title');
});

it('show an error if the project does not have a description', function () {

    $project_attributes = Project::factory()->raw([
        'description' => ''
    ]);

    // Act and Assert
    $this->post(route('projects.store'), $project_attributes)->assertSessionHasErrors('description');
});

// TODO: test if user can see a project