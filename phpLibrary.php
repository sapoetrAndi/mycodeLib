<?php
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