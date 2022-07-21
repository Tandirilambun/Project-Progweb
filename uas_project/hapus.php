<?php
    require "koneksi.php";

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $sql = "SELECT * FROM  data_produk WHERE id='$id'";
        $query= mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);

        if($result['Gambar'] !=''){
            $path='fileuploads/'.$result['Gambar'];

            unlink($path);
        }
        
        $sql = "DELETE FROM  data_produk WHERE id='$id'";
        $query= mysqli_query($conn, $sql);

        if(!$query){
            echo "Gagal menghapus data";
            exit;
        }

        header('location:dashboard-admin.php');

    }

?>