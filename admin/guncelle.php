<?php
if (isset($_POST['id'])) {
    $urun_id = $_POST['id'];
    $firma = $_POST['firma'];
    $barkod = $_POST['barkod'];

   
     $miktar = $_POST['miktar3'];

    $fiyat = $_POST['fiyat'];




// bunları diğer sayfalarda açıkladım geçiyorum

    $urun_id = $_POST['id'];
    $firma2 = $_POST['firma'];
    $barkod2 = $_POST['barkod'];
    $tarih = $_POST['tarih'];
  
     //$miktar2 = $_POST['miktar3'];
   $adet = $_POST['miktar'];
    $fiyat2 = $_POST['fiyat'];
    $fiyatson =  $fiyat2 * $adet;
  
    
   $urunismi2 = $_POST['urun_ismi2'];
   $turu2 = $_POST['turu2'];
   $anavatani2 = $_POST['anavatani2'];
   $iklim2 = $_POST['iklim2'];
   $aciklama2 = $_POST['aciklama2'];

   $gorsel2 = $_POST['gorsel'];
   
   



 
   $durum =  $_POST['durum'];
   





include "../baglanti.php";


/* update veri tabanında eklem edeğilde günceelme yapcaksan kullanılır mesela aa tablomda bb ve cc sütünüm var ve cc sütünü ile eşleşen değeri bu o satıradaki yani aynnı bağlıantlı satırdaki bb sütünumdakş veriyi güncellecem mesela

update ve set kullanılır bunun için                                                                      where kısmıda işte deiğim
                                                                                                      cc işe eşleşen var ise


               tablom     sütün = yeni değer  sütün = yeni değer     sütün = yeni değer  sütün = yeni değer    şeklinde */

$sql = "UPDATE urunver SET firma = '$firma', barkod_kodu = '$barkod', adet = '$miktar', fiyat = '$fiyat' WHERE id = '$urun_id'";

if ($conn->query($sql) === TRUE) {
    echo "Ürün başarıyla güncellendi";

    // Tarih değerini formatlayın
    $tarih_formatli = date('Y-m-d', strtotime($_POST['tarih']));

    // Ekleme işlemi için SQL sorgusu oluşturma
    $sql_ekle = "INSERT INTO stokkont (urun_ismi, turu, anavatani, iklim, aciklama, barkod_kodu, adet, firma, fiyat, fiyatson, tarih, gorsel, durum)
                VALUES ('$urunismi2', '$turu2', '$anavatani2', '$iklim2', '$aciklama2', '$barkod2', '$adet', '$firma', '$fiyat', '$fiyatson', '$tarih_formatli', '$gorsel2', '$durum')";

    if ($conn->query($sql_ekle) === TRUE) {
        echo "Ürün başarıyla eklendi";
                header("Location: onaylandi.php");
  exit(); // çıkış yap
    } else {
        echo "Ekleme işlemi başarısız: " . $conn->error;
    }
} else {
    echo "Güncelleme işlemi başarısız: " . $conn->error;
}

$conn->close();

}
?>
