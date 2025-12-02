<?php
include "../baglanti.php";
// Form verilerini al 
$firma = $_POST['firma'];

$firtel = $_POST['firtel'];


 /* Veritabanına veriyi ekle   insert into eklemek için kullanılır firmalar tablomda firma ve firtel sutunlarına $firma ve   $firtel değişkenlerini ekle  demek */
        $sql = "INSERT INTO firmalar (firma, firtel)
                VALUES ('$firma', '$firtel')";  /* değişkenler */

        if ($conn->query($sql) === TRUE) {  // eklendi ise 
           header("Location: onaylandi.php");  // onaylandi.php sayfasına git
  exit();
            
        } else {
            echo "Veri eklenirken hata oluştu: " . $conn->error;
        }
// Veritabanı bağlantısını kapat
$conn->close();
?>
