<?php
// mencari interval waktu
date_default_timezone_set("Asia/Jakarta");
$today = strtotime("today");
$company = $this->session->userdata('company');
$this_week_start = strtotime("this week monday 00:00:00");
$last_week_start = strtotime("last week monday 00:00:00");
$last_week_end = strtotime("last week sunday 23:59:59");
$this_month_start = strtotime("first day of this month");
$this_month_end = strtotime("last day of this month");
$last_month_start = strtotime("first day of last month");
$last_month_end = strtotime("last day of last month");

$datetime_order = strtotime($value['datetime_order']);
$date = date('Y-m-d H:i:s', $interval_datetime_order);
$interval = strtotime('+1 day', $datetime_order);
var_dump($interval);
var_dump($datetime_order);
var_dump("from table ".$value['datetime_order']);
var_dump($date);
var_dump(strtotime("today 08:00:00"));
var_dump(date('Y-m-d H:i:s', strtotime("today 08:00:00")));
//second parameter must be unix time stamp
$interval_datetime_order = strtotime("+1 days 3 hours 4 minutes", $datetime_order);
exit;