<?php

it('gives back a successful response for the homepage', function () {
    // Act and Assert
    $this->get(route('home'))
        ->assertStatus(200); //assertOk()
});
