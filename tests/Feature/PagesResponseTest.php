<?php

use function PHPUnit\Framework\assertEquals;

it('gives back a successful response for the homepage', function () {
    // Act and Assert
    $this->get(route('home'))
        ->assertStatus(200); //assertOk()
});

// it('gives back a successful response for the homepage 2', function () {
//     // Act and Assert
//     $response = $this->get(route('home'));

//     assertEquals(200, $response->getStatusCode());
// });
