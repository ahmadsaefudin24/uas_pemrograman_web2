<?php
session_start();
// membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","stockbarang");

//menambah barang Baru
if(isset($_POST['addnewbarang'])){
  $positif = $_POST['positif'];
  $dirawat = $_POST['dirawat'];
  $sembuh = $_POST['sembuh'];
  $meninggal = $_POST['meninggal'];
  $email = $_POST['email'];
  $namabank = $_POST['namabank'];
  $nmrrekening = $_POST['nmrrekening'];
  $addtotable = mysqli_query($conn,"insert into stock (positif,dirawat,sembuh,meninggal,email,namabank,nmrrekening) values ('$positif','$dirawat','$sembuh','meninggal','email','namabank','nmrrekening')");
  if($addtotable){
    header ('location:index.php');
  }else {
    echo 'Gagal';
    header('location:index.php');
  }
}
//update info barang
if(isset($_POST['updatebarang'])){
  $idb = $_POST['idb'];
  $namabarang = $_POST [ 'namabarang'];
  $deskripsi = $_POST [ 'deskripsi'];
  $email = $_POST ['email'];

  $update = mysqli_query($conn,"update stock set namabarang = '$namabarang', deskripsi = '$deskripsi', email = '$email' where idbarang = '$idb'");
  if ($update){
    header ('location:index.php');
  }else {
    echo 'Gagal';
    header('location:index.php');
  }
  }
  //menghapus barang dari stok
  if(isset($_POST['hapusbarang'])){
    $idb = $_POST ['idb'];

    $hapus = mysqli_query($conn,"delete from stock where idbarang = '$idb'");
    if ($hapus){
      header ('location:index.php');
    }else {
      echo 'Gagal';
      header('location:index.php');
    }
  }


