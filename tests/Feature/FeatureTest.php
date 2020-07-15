<?php

test('You can access the root route')
    ->get('/')
    ->assertOk();
