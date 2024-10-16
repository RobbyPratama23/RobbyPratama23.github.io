<?php
include 'koneksi.php';

if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];
    
    // Tambahkan tanda kutip pada variabel nama di query
    $sql = "SELECT * FROM data WHERE nama = '$nama'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $pesan = $_POST['pesan'];
    $nama_lama = $_GET['nama']; // Nama lama untuk kondisi WHERE

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
            $sql = "UPDATE data SET nama = ?, email = ?, hp = ?, pesan = ?, file = ? WHERE nama = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $nama, $email, $hp, $pesan, $file_name , $nama_lama);
            
          
      
          if ($stmt->execute()) {
            echo "<script>alert('Data berhasil diperbarui'); document.location.href='manage_data.php';</script>";
        
            } else {
                echo "Gagal memperbarui data: " . $conn->error;
            }
      
        } else {
          echo "<script>
                    alert('Gagal Memperbarui Data');
                    document.location.href = 'manage_data.php';
                  </script>";
        }
      }

    $stmt->close();
    $conn->close();
}
?>

<!-- Form Edit -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
        body {
            background-color: #010101; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0; 
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            
        }
        h2 {
            text-align: center;
        }
        div {
            margin-bottom: 15px; 
        }
        button {
            width: 100%; 
            padding: 10px; 
            background-color: #b6895b; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <form action="update.php?nama=<?php echo $row['nama']; ?>" method="POST" enctype="multipart/form-data">
            <h2>Edit Data</h2>
            <div>
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" value="<?php echo $row['nama']; ?>" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div>
                <label for="hp">No HP:</label>
                <input type="text" name="hp" id="hp" value="<?php echo $row['hp']; ?>" required>
            </div>
            <div>
                <label for="pesan">Pesan:</label>
                <textarea name="pesan" id="pesan" required><?php echo $row['pesan']; ?></textarea>
            </div>
            <div>
                <label for="file">File :</label>
                <input type="file" name="file" id="file" value="<?php echo $row['file']?>">
            </div>
            <button type="submit">Update Data</button>
        </form>
    </div>

</body>
</html>


