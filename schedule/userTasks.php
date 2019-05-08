<?php // schedule/BackTasks.php
$schedule = new \WatchOwl\CakeScheduler\Schedule\CakeSchedule();
$schedule
    ->run('/usr/bin/php backup.php')
    ->daily()
    ->description('Test');
return $schedule;

?>