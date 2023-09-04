<?php

use App\Models\Project;
use Illuminate\Support\Carbon;

it('shows projects overview', function () {

    // $this->withoutExceptionHandling();

    // Arrange
    $firstProject = Project::factory()->public()->create();
    $secondProject = Project::factory()->public()->create();
    $lastProject = Project::factory()->public()->create();

    // Act and Assert
    $this->get(route('home'))
        ->assertSeeText([
            $firstProject->title,
            $firstProject->description,
            $secondProject->title,
            $secondProject->description,
            $lastProject->title,
            $lastProject->description,
        ]);
});

it('shows only public projects', function () {
    // Arrange
    $publicProject = Project::factory()->public()->create();
    $privateProject = Project::factory()->create();

    // Act and Assert
    $this->get(route('home'))
        ->assertSeeText($publicProject->title)
        ->assertDontSeeText($privateProject->title);
});

it('shows projects by last modified date', function () {
    // Arrange
    $updatedProject = Project::factory()->public()->updated(Carbon::yesterday())->create();
    $lastUpdatedProject = Project::factory()->public()->updated()->create();

    // Act and Assert
    $this->get(route('home'))
        ->assertSeeTextInOrder([
            $lastUpdatedProject->title,
            $updatedProject->title
        ]);
});
