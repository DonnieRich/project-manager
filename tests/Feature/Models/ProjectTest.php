<?php

use App\Models\Project;

it('only returns public projects', function () {
    // Arrange
    Project::factory()->public()->create();
    Project::factory()->create();

    // Act and Assert
    expect(Project::public()->get())
        ->toHaveCount(1)
        ->first()->id->toEqual(1);
});
