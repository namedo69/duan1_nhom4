<?php
 include_once 'pdo.php';
           
function listHoaDon()
{
    $sql = 'select * from bill';
    return pdo_query($sql);
}

function getDailyRevenue($listHoaDon) {
    // Lấy ngày hiện tại
    $currentDate = date('Y-m-d');

    $totalRevenue = 0;

    // Duyệt qua mảng `$listHoaDon`
    foreach ($listHoaDon as $hoaDon) {
        // Kiểm tra trạng thái và ngày của `created_at`
        $createdAt = substr($hoaDon['created_at'], 0, 10); // Lấy ngày (Y-m-d)
        if ($hoaDon['status'] == 0 && $createdAt == $currentDate) {
            $totalRevenue += $hoaDon['total'];
        }
    }

    return $totalRevenue;
}

function getWeeklyRevenue($listHoaDon) {
    // Lấy ngày bắt đầu tuần và ngày kết thúc tuần (tuần này)
    $weekStart = date('Y-m-d', strtotime('monday this week')); // Ngày bắt đầu tuần (Thứ Hai)
    $weekEnd = date('Y-m-d'); // Ngày kết thúc tuần là hôm nay

    $totalRevenue = 0;

    // Duyệt qua mảng `$listHoaDon`
    foreach ($listHoaDon as $hoaDon) {
        // Kiểm tra trạng thái và ngày `created_at` trong tuần này
        $createdAt = substr($hoaDon['created_at'], 0, 10); // Lấy ngày (Y-m-d)
        if ($hoaDon['status'] == 0 && $createdAt >= $weekStart && $createdAt <= $weekEnd) {
            $totalRevenue += $hoaDon['total'];
        }
    }

    return $totalRevenue;
}
function getMonthlyRevenue($listHoaDon) {
    // Lấy tháng hiện tại (Y-m)
    $currentMonth = date('Y-m');

    $totalRevenue = 0;

    // Duyệt qua mảng `$listHoaDon`
    foreach ($listHoaDon as $hoaDon) {
        // Kiểm tra trạng thái và tháng của `created_at`
        $createdAt = substr($hoaDon['created_at'], 0, 7); // Lấy tháng (Y-m)
        if ($hoaDon['status'] == 0 && $createdAt == $currentMonth) {
            $totalRevenue += $hoaDon['total'];
        }
    }

    return $totalRevenue;
}

function listComment()
{
    $sql = 'SELECT *
FROM comment
ORDER BY comment_id DESC
LIMIT 4;';
    return pdo_query($sql);
}
function listContact()
{
    $sql = 'SELECT *
FROM contact
ORDER BY id DESC
LIMIT 6;';
    return pdo_query($sql);
}

function listClient()
{
    $sql = 'SELECT *
FROM client';
    return pdo_query($sql);
}


