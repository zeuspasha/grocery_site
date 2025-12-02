<?php
include "../baglanti.php";

// GET isteği aracılığıyla gelen barkod ve miktar bilgilerini al
$barkod = $_GET['barkod'];
$quantity = $_GET['quantity'];
$fiyat = $_GET['fiyat'];

// Veritabanındaki ilgili ürünü bul ve adet miktarını güncelle
$sql = "SELECT * FROM urunver WHERE barkod_kodu = '$barkod'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $stok_adet = $row["adet"];
        if ($stok_adet >= $quantity) {
            // Stok yeterli, adet miktarını güncelle
            $new_quantity = $stok_adet - $quantity;
            $update_sql = "UPDATE urunver SET adet = '$new_quantity' WHERE barkod_kodu = '$barkod'";
            if ($conn->query($update_sql) === TRUE) {
                echo json_encode(array("success" => true));
            } else {
                echo json_encode(array("success" => false));
            }
        } else {
            // Stok yetersiz
            echo json_encode(array("success" => false));
        }
    }
} else {
    // Ürün bulunamadı
    echo json_encode(array("success" => false));
}

// Veritabanı bağlantısını kapat
$conn->close();
?>

<?php
include "../baglanti.php";
// GET isteği aracılığıyla gelen barkod, miktar ve fiyat bilgilerini al
$barkod = $_GET['barkod'];
$quantity = $_GET['quantity'];
$fiyat = $_GET['fiyat'];

// Siparişi veritabanına ekle
$sql = "INSERT INTO siparis (barkod_kodu, fiyat, adet) VALUES ('$barkod', '$fiyat', '$quantity')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false, "error" => $conn->error));
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
