<?php

/**
 * File config mẫu -> dùng khi tạo mật khẩu ngẫu nhiên
 * Generate secure password hash - https://tinyfilemanager.github.io/docs/pwd.html
 */

// nếu ko có tham số này -> ko cho truy cập trực tiếp
if (!defined('APP_TITLE')) {
    die('No money no love!');
}

/**
 * Kiểm tra bảo mật đầu vào, phải thông qua link giới thiệu từ echbay.com mới cho phép truy cập
 * Đoạn có này sẽ sử dụng cho các file config của tinyfilemanager và config của phpmyadmin
 */
// Kiểm tra và tạo cookie truy cập
$echbay_allowed = false;
$echbay_cookie_name = 'eb_' . md5($_SERVER['HTTP_HOST']) . '_access_token';

if (
    isset($_SERVER['HTTP_REFERER']) &&
    (
        strpos($_SERVER['HTTP_REFERER'], 'echbay.com') !== false ||
        strpos($_SERVER['HTTP_REFERER'], 'cloud.echbay.com') !== false
    )
) {
    // Tạo khóa truy cập và lưu vào cookie: 1 ngày = 86400, 12 tiếng = 43200
    setcookie($echbay_cookie_name, md5(uniqid('echbay_', true)), time() + 43200, "/");
    $echbay_allowed = true;
}
// Nếu đã có cookie truy cập thì cũng cho phép
else if (isset($_COOKIE[$echbay_cookie_name])) {
    $echbay_allowed = true;
}

if (!$echbay_allowed) {
    header('HTTP/1.1 403 Forbidden');
    exit('Permission denny by cloud echbay!');
}

// gán lại giá trị cho biến auth_users -> xóa các thông tin config trước đó nếu có
$auth_users = [
    // {admin_password}
    'admin' => '{admin_hash_password}',
    // {user_password}
    'user' => '{user_hash_password}',
];
