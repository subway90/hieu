<?php


/**
 * Cập nhật một param của profile
 * @param string $param Tên cột cần update, tiền tố đã có sẵn : account_
 * @param string|int $value Giá trị cần update
 * @return void
 */
function update_profile($param,$value) {
    pdo_execute(
        'UPDATE account SET account_'.$param.' = ? WHERE account_id = ?',
        $value,auth('account_id')
    );
}