<?php
    $halaman = $_GET['hal'];
    $id =  $_GET['id'];
    if(empty($id)){}else{
        include('config.php');
        $result = mysqli_query($mysqli, "DELETE FROM $halaman WHERE id_jurusan=$id");
        header('location: '.$halaman.'.php');
    }
?>