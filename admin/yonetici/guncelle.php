<?php
if (isset($_POST['telefonn'])) {
    $urun_id = $_POST['isimm'];
    $barkod = $_POST['pinn'];
    $telefon = $_POST['telefonn'];

include "../../baglanti.php";
       /* güncellemek için update ve set olur demiştim diğerlerinde de sonr asütün = dyenideğeri yazar   where ile neye göre karlılaştırcacpını sçersin demiştim eşleşenleride değşitirsim


mesela bu kodda where id sütünü = "1" olanı al demiş yani id 1 olan sutunu bu ve oradaki satırdaı pin, telefon, isim gibi ve tarih gib ideğişkenleri değiştir  ve ek olarak yönetici tablomda yapıyor bunu */

    $sql = "UPDATE yonetici SET pin = '$barkod', telefon = '$telefon', isim = '$urun_id', `tarih` = current_timestamp() WHERE id = '1'";
                                                                                          //CURRENT_TIMESTAMP() bir MySQL işlevi ve mevcut tarih ve zamanı döndürür.
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../../index.php");
    exit;
    } else {
        echo "Güncelleme işlemi başarısız: " . $conn->error;
    }

    $conn->close();
}
?>
