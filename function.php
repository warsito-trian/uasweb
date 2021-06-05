<?php
session_start();
// membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","datavaksinasi");

//menambah barang Baru
if(isset($_POST['addnewbarang'])){
  $namafaskes = $_POST['namafaskes'];
  $nama = $_POST['nama'];
  $nik = $_POST['nik'];
  $kelamin = $_POST['kelamin'];
  $umur = $_POST['umur'];
  $nohp = $_POST['nohp'];
  $addtotable = mysqli_query($conn,"insert into stock (namafaskes,nama,nik,kelamin,umur,nohp) values ('$namafaskes','$nama','$nik','kelamin','umur','nohp')");
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
  $namafaskes = $_POST['namafaskes'];
  $nama = $_POST['nama'];
  $nik = $_POST['nik'];
  $kelamin = $_POST['kelamin'];
  $umur = $_POST['umur'];
  $nohp = $_POST['nohp'];
  $update = mysqli_query($conn,"update stock set namafaskes = '$namafaskes', nama = '$nama', nik = '$nik', kelamin = '$kelamin', umur = '$umur', nohp = '$nohp' where idbarang = '$idb'");
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


