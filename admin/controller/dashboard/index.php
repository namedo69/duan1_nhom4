<?php
include_once './model/dashboard.php';

$listHoaDon=listHoaDon();
$listComment=listComment();
$listContact=listContact();
$listClient=listClient();
$doanhthuthang=getMonthlyRevenue($listHoaDon);
$doanhthutuan=getWeeklyRevenue($listHoaDon);
$doanhthungay=getDailyRevenue($listHoaDon);

include_once './view/dashboard/index.php';