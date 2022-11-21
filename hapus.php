<?php
require 'function.php';
$id = $_GET["id"];

if(hapus($id)>0){
    echo"<script>
    alert('Data Telah Dihapus');
    document.location.href = 'tableview.php';
    </script>";
} else{
    echo"<script>
    alert('Gagal Menghapus Data');
    document.location.href = 'tableview.php';
    </script>";
}

?>