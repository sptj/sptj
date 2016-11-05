<?php
include('MysqlDataBase.php');
$databasemanager=new MysqlManager();
$state=$databasemanager->SelectSwitchState(1);
$databasemanager->CloseConnect();
echo "*@~".$state;
?>