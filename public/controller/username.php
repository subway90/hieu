<?php

// model
model('public','username');

// input
$username = substr(get_action_uri(0),1);

// query
$data_profile_username = get_one_username($username);

// valid
if(!$data_profile_username) view_error(404);

$data = [
    'profile' => $data_profile_username
];

view('public','username',get_action_uri(0),$data);