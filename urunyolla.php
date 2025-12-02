<?php
include "baglanti.php";  // veri tabanı bağlantı dosyamı dahil ettim

// Form verilerini alıyoruz bu kısımda
$urun_ismi = $_POST['urun_ismi'];

$aciklama = $_POST['aciklama'];

$turu = $_POST['turu'];
$anavatani = $_POST['anavatani'];
$iklim = $_POST['iklim'];        

// bu yukarı yapılanlar şu demek post medotu ile yolladığım verileri yakalıyoruz ve değişkene atıyoruz
// mesela şöyle düşün ahmet isimli bir çocuk var bu çocuk 12.html sınıfında ve ben bunu 13.html sınıfına (sayfasına)
// yönlendirmem gerekiyor o zaman 13.sınıf sayfasına git diyorum ama diğer hoca seni 12.sınıfdan olduğunu bilmesi lazım
// o yüzden 13.sınıfa gittiğinde hoca sana ismiyle seslenicek ahmet diye ona göre seni sınav yapıcak veya türlü işlemler
// ama ilk olarak seni tanımalı ve anlamalı kim olduğunu ahmet ismininn içeriğini senin hayat hikayenin olduğu gibi
// ahmet ismide seni temsil eden bir ahnatar onu bilirsen içini öğrenirsin ve okuyabilirsin


// özetle diğer sayfada isim oluşturduk ve bunu başka sayfaya göndererek yakaladık
// $ahmet = "genç ve yorgun biri";
// değerini diğer sayfaya yolladığımda ve ahmeti yakaldığımda değeri ekrana bastırırsam şu yazar:  genç ve yorgun biri



// görseli kaydediceğim adresi belirtiyorum klasorlerde
$target_dir = "urungorsel/";
$gorsel_isim = $urun_ismi . $anavatani . $iklim  . basename($_FILES["gorsel"]["name"]); // Görsel dosya adını oluştur

$target_file = $target_dir . $gorsel_isim;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Görseli kontrol et
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["gorsel"]["tmp_name"]);
    if ($check !== false) {
        echo "Dosya bir resim - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Dosya bir resim değil.";
        $uploadOk = 0;
    }
}

// Görseli sunucuya kaydet
if ($uploadOk == 0) {
    echo "Dosya yüklenemedi.";
} else {
    if (move_uploaded_file($_FILES["gorsel"]["tmp_name"], $target_file)) {
        echo "Dosya " . htmlspecialchars(basename($_FILES["gorsel"]["name"])) . " başarıyla yüklendi.";
  // Ürün ismini kontrol et  veri tabanı bağlantısı select ile sütünü seçiyorum urunver tablomdan diyorum kli urun_ismi eşit ise  $urun_ismi ne

$checkProductNameQuery = "SELECT barkod_kodu FROM urunver WHERE urun_ismi = '$urun_ismi'";
$result = $conn->query($checkProductNameQuery);

if ($result->num_rows > 0) {
    // Ürün ismi zaten mevcut, barkod kodunu al
    $row = $result->fetch_assoc();
    $barkod_kodu = $row['barkod_kodu'];
} else {
    // Ürün ismi mevcut değil, boş barkod kodu ata
    $barkod_kodu = "";
}

// Veriyi ekle
$sql = "INSERT INTO urunver (urun_ismi, turu, anavatani, iklim, aciklama, gorsel, barkod_kodu)
        VALUES ('$urun_ismi', '$turu', '$anavatani', '$iklim', '$aciklama', '$gorsel_isim', '$barkod_kodu')";

if ($conn->query($sql) === TRUE) {
    echo "Veri başarıyla eklendi.";
    header("Location: admin/onaylandi.php");
    exit();
}

             

      else {
            echo "Veri eklenirken hata oluştu: " . $conn->error;
        }
    } else {
        echo "Dosya yükleme hatası.";
    }
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
