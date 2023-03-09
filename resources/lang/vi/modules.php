<?php

use Illuminate\Console\Scheduling\Schedule;

return array (
    'dashboard' => array (
        'dashboard-title' => 'Hệ Thống Quản Trị',
        'menu' => array (
            'home' => 'Về trang chủ',
            'news' => 'Tin tức',
            'contact' => 'Liên hệ',
            'sendnews' => 'Nhận tin mới nhất',
            'freetutorial' => 'Hướng dẫn miễn phí',
            'gallery'=> 'Bộ sưu tập',
            'schedule' => 'Lịch học',
            'web' => 'Giao diện',
            'class' => array(
                'title' => 'Khóa học',
                'online' => 'Khóa học trực tuyến',
                'hands' => 'Khóa học thực hành',
                'level' => 'Cấp độ',
                'discount' => 'Phiếu giảm giá',
                'bill' => 'Đơn mua khóa học',
            ),
            'cake' => array(
                'title' => 'Bánh',
                'type' => 'Loại bánh',
                'size' => 'Kích thước bánh',
                'shape' => 'Hình dạng bánh',
                'bill' => 'Đơn đặt bánh',
            ),
            'admin' => array(
                'title' => 'Tài khoản',
                'list' => 'Danh sách tài khoản',
                'type' => 'Loại tài khoản',
                'permissions' => 'Quyền hạn',
            ),
        ),
        'login' => 'Đăng nhập',
        'forgot' => 'Quên mật khẩu'
    ),
    'menuuser' => array(
        'onlineclass' => 'Khóa Học Trực Tuyến',
        'handsonclass' => 'Khóa Học Thực Hành',
        'cakeorder' => 'Đặt Bánh',
        'news'=>'Tin Tức',
        'schedules' => 'Lịch Học',
        'freetutorials'=>'Hướng Dẫn Miễn Phí',
        'contacts'=>'Liên Hệ',
    ),
    'admin' => array (
        'profile'     => 'Thông tin cá nhân',
        'logout'      => 'Đăng xuất',
        'avatar'      => 'Ảnh đại diện',
        'changepass'  => 'Đổi mật khẩu',
        'changeinfor' => 'Chỉnh sửa thông tin',
        'mail'        => 'Email',
        'phone'       => 'Số điện thoại',
        'birth'       => 'Ngày sinh',
        'sex'         => 'Giới tính',
    ),
    'changepass' => array (
        'oldpass' => 'Mật khẩu cũ',
        'newpass' => 'Mật khẩu mới',
        'confirm' => 'Nhập lại mật khẩu mới',
    ),
    'changeinfor' => array (
        'name'    => 'Tên đầy đủ',
        'mail'    => 'Email',
        'phone'   => 'Số điện thoại',
        'birth'   => 'Ngày sinh',
        'sex'     => 'Giới tính',
        'confirm' => 'Xác nhận',
    ),
    'button' => array(
        'add'    => 'Thêm',
        'delete' => 'Xóa',
        'edit'   => 'Sửa',
    ),
    'back' => 'Trở về',
    'news' => array(
        'img'     => 'Hình ảnh',
        'name'    => 'Tiêu đề',
        'summary' => 'Tóm tắt',
        'content' => 'Nội dung',
    ),
    'freetutorials' => array(
        'video' => 'Video',
        'name'  => 'Tiêu đề',
    ),
    'schedule' => array(
        'name'       => 'Tên khóa học',
        'start_day'  => 'Từ ngày',
        'end_day'    => 'Đến ngày',
        'start'      => 'Bắt đầu',
        'end'        => 'Kết thúc',
        'week'       => 'Ngày học trong tuần',
    ),
    'levels' => array(
        'name' => 'Tiêu đề',
    ),
    'online' => array(
        'img'         => 'Hình ảnh',
        'name'        => 'Tên khóa học',
        'summary'     => 'Tóm tắt',
        'content'     => 'Nội dung',
        'level'       => 'Cấp độ',
        'price'       => 'Giá',
        'promo_price' => 'Giá khuyến mãi (nếu có)',
        'lesson'      => 'Số bài học',
        'trailer'     => 'Trailer',
        'video'       => 'Video',
    ),
    'cake' => array(
        'img'         => 'Hình ảnh',
        'name'        => 'Tên bánh',
        'summary'     => 'Tóm tắt',
        'content'     => 'Mô tả',
        'note'        => 'Ghi chú',
        'type'        => 'Loại bánh',
        'code'        => 'Mã bánh',
        'size'        => 'Kích thước',
    ),
    'discount' => array(
        'code'     => 'Mã giảm giá',
        'discount' => 'Giảm giá (%)'
    ),
    'web' => array(
        'online' => 'Banner Khóa học trực tuyến',
        'hands'  => 'Banner Khóa học thực hành',
        'order'  => 'Banner Đặt bánh',
        'title'  => 'Banner Tiêu đề',
        'decrip' => 'Banner Mô tả',
        'search' => 'Tìm kiếm'
    ),
);
