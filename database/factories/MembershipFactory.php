<?php

use App\Member;

$factory->define(Member::class, function () {

    $roles = array('coach', 'admin', 'member', 'guest');

    return [
        'user_id' => rand(1, 10),
        'group_id' => rand(1, 3),
        'group_role' => $roles[rand(0, 3)]
    ];
});
