<?php
$conn = mysqli_connect("localhost", "root", "", "pbolouis");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_mhs WHERE id_mhs = $id");
    return mysqli_affected_rows($conn);
}

function update($data){
    global $conn;
$id = $data["id"];
$nim = htmlspecialchars($data["nim"]);
$nama = htmlspecialchars($data["nama"]);
$jk = htmlspecialchars($data["jk"]);
$alamat = htmlspecialchars($data["alamat"]);
$prodi = htmlspecialchars($data["prodi"]);
$foto = htmlspecialchars($data["foto"]);
$email = htmlspecialchars($data["email"]);

$query = "UPDATE tbl_mhs SET nim = '$nim', nama = '$nama', jk = '$jk', alamat = '$alamat', prodi = '$prodi', foto = '$foto', email = '$email' WHERE id_mhs = $id";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}
?>