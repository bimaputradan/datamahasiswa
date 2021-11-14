<?php
    $halaman = $_GET['hal'];
    $id =  $_GET['id'];
    if(empty($id)){}else{
        include('config.php');
        if($halaman=='jurusan'){
            $result = mysqli_query($mysqli, "DELETE FROM $halaman WHERE id_jurusan=$id");
            $result2 = mysqli_query($mysqli, "DELETE FROM 'mahasiswa' WHERE id_jurusan=$id");
        } elseif ($halaman=='mahasiswa'){
            $result = mysqli_query($mysqli, "DELETE FROM $halaman WHERE id_mhs=$id");
            $result2 = mysqli_query($mysqli, "DELETE FROM 'mahasiswa' WHERE id_jurusan=$id");
        }
        header('location: '.$halaman.'.php');
    }
?>