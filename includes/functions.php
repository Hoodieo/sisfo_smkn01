<?php
error_reporting(~E_NOTICE);
session_start();
ini_set('memory_limit', '512M');
ini_set('upload_max_filesize', '32M');

include 'config.php';
include 'db.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);
include'general.php';
    
$mod = $_GET['m'];
$act = $_GET['act'];

function getRandomId(){
    global $db;
    $new_id = rand(1111,9999);
    
    return $new_id;
}

function getGuruOption($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT * FROM tbl_guru ORDER BY id_guru");
    foreach($rows as $row){
        if($row->id_guru==$selected)
            $a.="<option value='$row->id_guru' selected>[$row->kode_guru] $row->nama_guru</option>";
        else
            $a.="<option value='$row->id_guru'>[$row->kode_guru] $row->nama_guru</option>";
    }
    return $a;
}

function getKelasOption($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT * FROM tbl_kelas ORDER BY id_kelas");
    foreach($rows as $row){
        if($row->id_kelas==$selected)
            $a.="<option value='$row->id_kelas' selected>$row->jenjang $row->jurusan $row->kelas</option>";
        else
            $a.="<option value='$row->id_kelas'>$row->jenjang $row->jurusan $row->kelas</option>";
    }
    return $a;
}

function getMapelOption($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT * FROM tbl_mapel ORDER BY id_mapel");
    foreach($rows as $row){
        if($row->id_mapel==$selected)
            $a.="<option value='$row->id_mapel' selected>$row->mata_pelajaran</option>";
        else
            $a.="<option value='$row->id_mapel'>$row->mata_pelajaran</option>";
    }
    return $a;
}

