<?php
include "../baglanti.php";

// Formdan gelen verileri al  bunları başka sayfada açıkladım
$urun_id = $_POST['urun_id'];

$barkod_kodu = $_POST['barkod_kodu'];
$telefon_numarasi = $_POST['telefon_numarasi'];
$adet = $_POST['adet'];
$fiyat = $_POST['fiyat'];

$teslim = $_POST['teslim'];


// Veritabanında ilgili ürünü güncelleme güncelleme için UPDATE VE SET
$sql = "UPDATE siparis SET  barkod_kodu='$barkod_kodu', telefon='$telefon_numarasi', adet='$adet', fiyat='$fiyat', teslim='$teslim' WHERE id='$urun_id'";

if ($conn->query($sql) === TRUE) {
    echo "Ürün başarıyla güncellendi.";
    header("location: siparisler.php");  // güncellenme oldu yani veriler gönderildise sorunsuz siparisler.php git
} else {
    echo "Hata oluştu: " . $conn->error;
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
