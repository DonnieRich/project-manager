<?php

it('gives back a successful response for the homepage', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
