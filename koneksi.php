<?php
  // Buat koneksi
  $conn = mysqli_connect("localhost", "root", "", "ecleven");

  // Periksa koneksi
  if (mysqli_connect_error()) {
      die("Gagal konek ke MySQL: " . mysqli_connect_error());
  }
?>
