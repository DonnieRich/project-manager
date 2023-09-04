<?php

use App\Models\Project;

it('shows projects overview', function () {

    // $this->withoutExceptionHandling();

    // Arrange
    Project::factory()->create(['title' => 'Project A']);
    Project::factory()->create(['title' => 'Project B']);
    Project::factory()->create(['title' => 'Project C']);

    // Act and Assert
    $this->get(route('home'))
        ->assertSeeText([
            'Project A',
            'Project B'
        ]);
});

it('shows only public projects', function () {
    // Arrange

    // Act

    // Assert
});

it('shows projects by last modified date', function () {
    // Arrange

    // Act

    // Assert
});
