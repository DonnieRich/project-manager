<?php

use App\Models\Project;

it('allows a user to create a project', function () {

    $this->withoutExceptionHandling();

    // Arrange
    $project = Project::factory()->make()->toArray();

    // Act
    $this->post('/projects', $project);

    // Assert
    $this->assertDatabaseHas('projects', $project);
});
