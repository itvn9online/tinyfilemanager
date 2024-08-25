<?php

/**
 * File config mẫu -> dùng khi tạo mật khẩu ngẫu nhiên
 * Generate secure password hash - https://tinyfilemanager.github.io/docs/pwd.html
 */

// nếu ko có tham số này -> ko cho truy cập trực tiếp
if (!defined('APP_TITLE')) {
    die('No money no love!');
}

// gán lại giá trị cho biến auth_users -> xóa các thông tin config trước đó nếu có
$auth_users = [
    // {admin_password}
    'admin' => '{admin_hash_password}',
    // {user_password}
    'user' => '{user_hash_password}',
];
