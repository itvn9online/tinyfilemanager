<?php

/**
 * File config mẫu -> dùng khi tạo mật khẩu ngẫu nhiên
 */

// nếu ko có tham số này -> ko cho truy cập trực tiếp
if (!defined('APP_TITLE')) {
    die('No money no love!');
}

// gán lại biến auth_users -> xóa các thông tin config trước đó nếu có
$auth_users = [];
