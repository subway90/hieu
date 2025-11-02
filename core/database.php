<?php
/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function pdo_get_connection()
{
    $dburl = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
    $username = DB_USER;
    $password = DB_PASS;

    try {
        $conn = new PDO($dburl, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (\Throwable $th) {
        die(_s_me_error.'<b>Kết nối database thất bại. Chi tiết :</b><br> '.$th._e_me_error);
    }
}


/**
 * Hàm dùng để INSERT, UPDATE, DELETE
 * 
 * Hàm được nâng cấp để tránh SQL Injection
 * 
 * @param mixed $sql Câu lệnh SQL
 * @param array $args Tham số truyền vào
 * @return void
 */
function pdo_execute($sql, ...$args)
{
    if(!DB_BOOL) die(_s_me_error.'Database chưa được bật'._e_me_error);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


/**
 * Hàm dùng để SELECT trả về nhiều dòng
 * @return array
 */
function pdo_query($sql)
{
    if(!DB_BOOL) return ['Database chưa được bật'];
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


/**
 * Hàm dùng để SELECT trả về 1 dòng
 * @return array
 */
function pdo_query_one($sql)
{
    if(!DB_BOOL) return ['Database chưa được bật'];
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


/**
 * Hàm dùng để SELECT trả về giá trị
 * @return string | int
 */
function pdo_query_value($sql)
{
    if(!DB_BOOL) return 'Database chưa được bật';
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? array_values($row)[0] : null; // Trả về null nếu không có bản ghi
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


/**
 * Hàm này dùng để xoá mềm một record của một bảng
 * @param mixed $table_name Tên bảng cần xoá
 * @param mixed $id_record ID cần xoá
 * @return void
 */
function delete_one($table_name,$id_record) {
    pdo_execute(
        'UPDATE '.$table_name.' SET deleted_at = current_timestamp WHERE id_'.$table_name.' = ?',
        $id_record
    );
}


/**
 * Hàm này dùng để khôi phục xoá mềm một record của một bảng
 * @param mixed $table_name Tên bảng cần khôi phục
 * @param mixed $id_record ID cần khôi phục
 * @return void
 */
function restore_one($table_name,$id_record) {
    pdo_execute(
        'UPDATE '.$table_name.' SET deleted_at = NULL WHERE id_'.$table_name.' = ?',
        $id_record
    );
}


/**
 * Kiểm tra một record có tồn tại hay không
 * 
 * Lưu ý: chỉ kiểm tra ở trạng thái hoạt động, tức chưa xoá mềm
 * @param mixed $table_name Tên bảng cần kiểm tra
 * @param string $record_id ID cần kiểm tra
 * @param bool | null $in_trash Kiểm tra chỉ các record đã xoá mềm
 * @return mixed Trả về ID record nếu có tồn tại, trả về false nếu không tồn tại
 */
function check_exist_one_by_id($table_name,$record_id,$in_trash = false) {
    // in trash
    $in_trash_query = '';
    if($in_trash) $in_trash_query = 'AND deleted_at';
    
    // query
    if(pdo_query_value(
        'SELECT '.$table_name.'_id FROM '.$table_name.' WHERE '.$table_name.'_id = ? '.$in_trash_query,
        $record_id
    )) return true;
    return false;
}


/**
 * Kiểm tra một record có tồn tại hay không theo tên cột tuỳ biến
 * 
 * Lưu ý: chỉ kiểm tra ở trạng thái hoạt động, tức chưa xoá mềm
 * @param mixed $table_name Tên bảng cần kiểm tra
 * @param string $record_name Tên cột cần kiểm tra
 * @param string $record_value Giá trị cần kiểm tra
 * @param bool | null $in_trash Kiểm tra chỉ các record đã xoá mềm
 * @param int | null $except_id ID ngoại trừ
 * @return string|false Trả về ID record nếu có tồn tại, trả về false nếu không tồn tại
 */
function check_exist_one_by_custom($table_name,$record_name,$record_value,$in_trash = false, $except_id = null) {
    // except id
    $except_id_query = '';
    if($except_id) $except_id_query = 'AND '.$table_name.'_id != '.$except_id;

    // in trash
    $in_trash_query = '';
    if($in_trash) $in_trash_query = 'AND deleted_at';
    
    // query
    return pdo_query_value(
        'SELECT '.$table_name.'_id FROM '.$table_name.' WHERE '.$record_name.' = ? '.$in_trash_query.$except_id_query,
        $record_value
    );
}
