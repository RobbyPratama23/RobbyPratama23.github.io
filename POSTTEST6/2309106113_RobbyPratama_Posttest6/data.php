<?php

include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$pesan = $_POST['pesan'];

$tmp_name = $_FILES['file']['tmp_name'];
$file_name = $_FILES['file']['name'];

$validExtension = ['doc', 'docx', 'pdf'];
$fileExtension = explode('.', $file_name);
$fileExtension = strtolower(end($fileExtension));

if (!in_array($fileExtension, $validExtension)) {
  echo "
          <script>
              alert('File yang diupload bukan gambar!');
              document.location.href = 'index.html';
          </script>";
} else {
  $newFileName = date('d-m-y') . '-' . $file_name;

  if (move_uploaded_file($tmp_name, 'files/' . $newFileName)) {
    $sql = "INSERT INTO data (nama, email, hp, pesan, file) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nama, $email, $hp, $pesan, $file_name);

    if ($stmt->execute()) {
      echo "<script>
              alert('Berhasil menambah data');
              document.location.href = 'index.html';
            </script>";
  
  } else {
      echo "<script>
              alert('Gagal menambah data');
              document.location.href = 'index.html';
            </script>";
  }

  } else {
    echo "<script>
              alert('Gagal Menambah Data');
              document.location.href = 'index.html';
            </script>";
  }
}
  
// Menutup koneksi
$stmt->close();
$conn->close();

?>