<?php
//共通に使う関数を記述

function h($a)
{
    return htmlspecialchars($a, ENT_QUOTES);
}

function db_conn(){
    try {
        $pdo = new PDO('mysql:dbname=book_db;charset=utf8;host=localhost','root','');//さくらのサーバをもらえたらhost＝のところを変える、ID、PWD(zampはなし、rampはroot)
        return $pdo;
    } catch (PDOException $e) {
        exit('DB-Connection-Error:'.$e->getMessage());
      }
}

function db_conn_user(){
    try {
        $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');//さくらのサーバをもらえたらhost＝のところを変える、ID、PWD(zampはなし、rampはroot)
        return $pdo;
    } catch (PDOException $e) {
        exit('DB-Connection-Error:'.$e->getMessage());
      }
}


function redirect($page){
    header("Location: ".$page);
    exit;
    }

function sqlerror($stmt){
  $error = $stmt->errorInfo();
  exit("ErrorSQL:".$error[2]);
  }

function sessChk(){
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
      header("Location:login.php");exit;
  }else{
      session_regenerate_id(true);
      $_SESSION["chk_ssid"]=session_id();
  }
  }