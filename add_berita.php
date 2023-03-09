<?php include('koneksi.php'); 

$hari=$_POST["hari"];
$tanggal=$_POST["tanggal"];
$bahasan=$_POST["bahasan"];
$jml_mahasiswa=$_POST["jml_mahasiswa"];

$sql = "INSERT INTO `berita` (`hari`, `tanggal`, `bahasan`, `jml_mahasiswa`) VALUES ('$hari', '$tanggal', '$bahasan', '$jml_mahasiswa')";
$query = mysqli_query($koneksi, $sql);
if($query==true){
    $data = array(
        'status' => 'success',
    );
    echo json_encode($data);
}
else 
{
    $data = array(
        'status' => 'error',
    );
    echo json_encode($data);
}

?>