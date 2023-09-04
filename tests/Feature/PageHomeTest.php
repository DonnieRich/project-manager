<?php

use App\Models\Project;

it('shows projects overview', function () {

    // $this->withoutExceptionHandling();

    // Arrange
    Project::factory()->create(['title' => 'Project A', 'description' => 'Project A description']);
    Project::factory()->create(['title' => 'Project B', 'description' => 'Project B description']);
    Project::factory()->create(['title' => 'Project C', 'description' => 'Project C description']);

    // Act and Assert
    $this->get(route('home'))
        ->assertSeeText([
            'Project A',
            'Project A description',
            'Project B',
            'Project B description',
            'Project C',
            'Project C description'
        ]);
});

it('shows only public projects', function () {
    // Arrange
    Project::factory()->create(['title' => 'Project A', 'public' => true]);
    Project::factory()->create(['title' => 'Project B']);

    // Act and Assert
    $this->get(route('home'))
        ->assertSeeText([
            'Project A',
        ])
        ->assertDontSeeText([
            'Project B',
        ]);
});

it('shows projects by last modified date', function () {
    // Arrange

    // Act

    // Assert
});
