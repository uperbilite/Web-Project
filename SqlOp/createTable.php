<?php


include_once "connection.php";

$sql ="CREATE TABLE `mydb`.`work` ( `uid` VARCHAR(20) NULL DEFAULT NULL , 
    `username` TEXT NULL DEFAULT NULL , `courseName` TEXT NULL DEFAULT NULL , 
    `class` VARCHAR(20) NULL DEFAULT NULL , `workName` TEXT NULL DEFAULT NULL , `workAddress` VARCHAR(255) NULL DEFAULT NULL ) ENGINE = MyISAM";
$res = $mysqli->query($sql);

$sql ="CREATE TABLE `mydb`.`courseware` ( `courseName` TEXT NULL DEFAULT NULL ,
   `courseWareName` TEXT NULL DEFAULT NULL , `address` VARCHAR(255) NULL DEFAULT NULL ) ENGINE = MyISAM";
$res = $mysqli->query($sql);
$sql ="CREATE TABLE `mydb`.`teachers` ( `uid` VARCHAR(11) NULL DEFAULT NULL ,
    `username` VARCHAR(255) NULL DEFAULT NULL , `password` VARCHAR(255) NULL DEFAULT NULL ,
   `class` VARCHAR(40) NULL DEFAULT NULL , `address` VARCHAR(255) NULL DEFAULT NULL ) ENGINE = MyISAM";
$res = $mysqli->query($sql);
$sql = "CREATE TABLE `mydb`.`students` ( `uid` VARCHAR(11) NULL DEFAULT NULL , `
    username` VARCHAR(255) NULL DEFAULT NULL , `password` VARCHAR(255) NULL DEFAULT NULL , 
    `class` VARCHAR(40) NULL DEFAULT NULL , `address` VARCHAR(255) NULL DEFAULT NULL,
    `courses` VARCHAR (255) NULL DEFAULT NULL) ENGINE = MyISAM";
$res = $mysqli->query($sql);
$sql = "CREATE TABLE `mydb`.`checkin` ( `uid` VARCHAR(255) NULL DEFAULT NULL , `
    username` VARCHAR(255) NULL DEFAULT NULL , `password` VARCHAR(255) NULL DEFAULT NULL , 
    `class` VARCHAR(255) NULL DEFAULT NULL ,
    `courses` VARCHAR (255) NULL DEFAULT NULL , `time` VARCHAR(255) NULL DEFAULT NULL) ENGINE = MyISAM";
$res = $mysqli->query($sql);


echo "Table创建成功";