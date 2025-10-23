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
 * Kiểm tra một bảng có tồn tại hay không
 * 
 * Lưu ý: chỉ kiểm tra ở trạng thái hoạt động, tức chưa xoá mềm
 * @param mixed $table_name Tên bảng cần kiểm tra
 * @param mixed $id_record ID cần kiểm tra
 * @return bool Trả về true nếu có tồn tại, trả về false nếu không tồn tại
 */
function check_exist_one($table_name,$id_record) {
    if(pdo_query_value(
        'SELECT id_'.$table_name.' FROM '.$table_name.' WHERE id_'.$table_name.' = ? AND deleted_at IS NULL',
        $id_record
    )) return true;
    return false;
}

/**
 * Kiểm tra một bảng đã xoá mềm có tồn tại hay không
 * 
 * Lưu ý: chỉ kiểm tra ở trạng thái đã được xoá mềm
 * @param mixed $table_name Tên bảng cần kiểm tra
 * @param mixed $id_record ID cần kiểm tra
 * @return bool Trả về true nếu có tồn tại, trả về false nếu không tồn tại
 */
function check_exist_one_in_trash($table_name,$id_record) {
    if(pdo_query_value(
        'SELECT id_'.$table_name.' FROM '.$table_name.' WHERE id_'.$table_name.' = ? AND deleted_at'
        ,$id_record
    )) return true;
    return false;
}

/**
 * Kiểm tra một record có tồn tại trong bảng hay không, bao gồm cả xoá mềm
 * 
 * @param mixed $table_name Tên bảng cần kiểm tra
 * @param mixed $id_record ID cần kiểm tra
 * @return bool Trả về true nếu có tồn tại, trả về false nếu không tồn tại
 */
function check_exist_one_with_trash($table_name,$id_record) {
    if(pdo_query_value(
        'SELECT id_'.$table_name.' FROM '.$table_name.' WHERE id_'.$table_name.' = ?',
        $id_record)) return true;
    return false;
}

/**
 * Kiểm tra một tên trong bảng có tồn tại hay không
 * 
 * Lưu ý: chỉ kiểm tra ở trạng thái hoạt động, tức chưa xoá mềm
 * @param mixed $table_name Tên bảng cần kiểm tra
 * @param mixed $name_record Tên cần kiểm tra
 * @return bool Trả về true nếu có tồn tại, trả về false nếu không tồn tại
 */
function check_exist_one_by_name($table_name,$name_record) {
    if(pdo_query_value(
        'SELECT id_'.$table_name.' FROM '.$table_name.' WHERE name_'.$table_name.' = ? AND deleted_at IS NULL',
        $name_record
    )) return true;
    return false;
}

/**
 * Kiểm tra một tên trong bảng có tồn tại hay không, ngoại trừ id_record
 * 
 * Lưu ý: chỉ kiểm tra ở trạng thái hoạt động, tức chưa xoá mềm
 * @param mixed $table_name Tên bảng cần kiểm tra
 * @param mixed $name_record Tên cần kiểm tra
 * @return bool Trả về true nếu có tồn tại, trả về false nếu không tồn tại
 */
function check_exist_one_by_name_except_id($table_name,$name_record,$id_record) {
    if(pdo_query_value(
        'SELECT id_'.$table_name.' FROM '.$table_name.' WHERE name_'.$table_name.' = ? AND id_'.$table_name.' != '.$id_record.' AND deleted_at IS NULL',
        $name_record
    )) return true;
    return false;
}

/**
 * Kiểm tra một tên trong bảng có tồn tại hay không trong danh sách xoá
 * 
 * Lưu ý: chỉ kiểm tra ở trạng thái đã xoá mềm
 * @param mixed $table_name Tên bảng cần kiểm tra
 * @param mixed $name_record Tên cần kiểm tra
 * @return bool Trả về true nếu có tồn tại, trả về false nếu không tồn tại
 */
function check_exist_one_by_name_in_trash($table_name,$name_record) {
    if(pdo_query_value(
        'SELECT id_'.$table_name.' FROM '.$table_name.' WHERE name_'.$table_name.' = ? AND deleted_at',
        $name_record
    )) return true;
    return false;
}

/**
 * Kiểm tra một record có tồn tại trong bảng bởi slug khi chưa xoá mềm
 * 
 * Lưu ý: chỉ kiểm tra ở trạng thái hoạt động, tức chưa xoá mềm
 * 
 * @param mixed $table_name Tên bảng cần kiểm tra
 * @param mixed $slug Đường dẫn cần kiểm tra
 * @return bool Trả về true nếu có tồn tại, trả về false nếu không tồn tại
 */
function check_exist_one_by_slug($table_name,$slug) {
    if(pdo_query_value(
        'SELECT id_'.$table_name.' FROM '.$table_name.' WHERE slug_'.$table_name.' = ? AND deleted_at IS NULL',
        $slug
    )) return true;
    return false;
}

/**
 * Kiểm tra một record có tồn tại trong bảng bởi slug khi đã xoá mềm
 * 
 * Lưu ý: chỉ kiểm tra ở trạng thái xoá mềm
 * 
 * @param mixed $table_name Tên bảng cần kiểm tra
 * @param mixed $slug Đường dẫn cần kiểm tra
 * @return bool Trả về true nếu có tồn tại, trả về false nếu không tồn tại
 */
function check_exist_one_by_slug_in_trash($table_name,$slug) {
    if(pdo_query_value(
        'SELECT id_'.$table_name.' FROM '.$table_name.' WHERE slug_'.$table_name.' = ?',
        $slug
    )) return true;
    return false;
}

/**
 * Kiểm tra một record có tồn tại trong bảng bởi slug bao gồm cả xoá mềm
 * 
 * 
 * @param mixed $table_name Tên bảng cần kiểm tra
 * @param mixed $slug Đường dẫn cần kiểm tra
 * @return bool Trả về true nếu có tồn tại, trả về false nếu không tồn tại
 */
function check_exist_one_by_slug_with_trash($table_name,$slug) {
    if(pdo_query_value(
        'SELECT id_'.$table_name.' FROM '.$table_name.' WHERE slug_'.$table_name.' = ?',
        $slug
    )) return true;
    return false;
}

/**
 * Thực hiện xoá vĩnh viễn một record của một bảng
 * @param mixed $table_name Tên bảng cần xoá cứng
 * @param mixed $id_record ID cần xoá cứng
 * @return void
 */
function delete_force_one($table_name,$id_record) {
    pdo_execute(
        'DELETE FROM '.$table_name.' WHERE id_'.$table_name.' = ?',
        $id_record
    );
}