<?php

/**
 * Lấy thông tin cá nhân theo @username
 * @param mixed $username Username cần lấy
 * @return array
 */
function get_one_username($username) {
    return pdo_query_one(
        'SELECT *
        FROM user
        WHERE username = ?'
        ,$username
    );
}