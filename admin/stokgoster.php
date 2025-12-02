


<?php  

if (isset($_POST['urun_id'])) {
    $urun_id = $_POST['urun_id'];
    
    // Veritabanı bağlantısı için gerekli bilgiler
   

include "../baglanti.php";
$sql = "SELECT * FROM urunver WHERE id = '$urun_id'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-details">';
        echo '<img src="../urungorsel/' . $row['gorsel'] . '" alt="' . $row['urun_ismi'] . '" class="product-image">';
        echo '<h3 class="product-title">' . $row['urun_ismi'] . '</h3>';
       // echo '<p class="product-barkod">Firma:' . $row['firma'] .'<br><br>';
        echo '<p class="product-barkod">Şuanki Toplam Adet Miktarı:   ' . $row['adet'] . '</p>';
      
        
        echo '</p>';
       echo '<form id="myForm" method="post" action="guncelle.php">';
echo '<input type="hidden" name="id" value="' . $urun_id . '">';

// Firmaları sırala ve açılır menü olarak oluştur
$sql_firmalar = "SELECT firma FROM firmalar";
$result_firmalar = $conn->query($sql_firmalar);

if ($result_firmalar->num_rows > 0) {
    echo '<label>Seçili Firma: </label><select name="firma">';
    
    while ($row_firma = $result_firmalar->fetch_assoc()) {
        $selected = ($row_firma['firma'] == $row['firma']) ? 'selected' : '';
        echo '<option name="firma" value="' . $row_firma['firma'] . '" ' . $selected . '>' . $row_firma['firma'] . '</option>';
    }
    
    echo '</select>';
}

echo '<p class="product-barkod">Barkod: <input type="text" name="barkod" value="' . $row['barkod_kodu'] . '"></p>';
echo '<input type="radio" name="islem" value="ekle" checked> Ürün Ekle___||___';
echo '<input type="radio" name="islem" value="cikar"> Ürün Çıkar';

echo '<input type="hidden" name="miktarorjinal" value="' . $row['adet'] . '">';
echo '<p class="product-barkod">Yeni Adeti Gir:<input type="text" name="miktar"></p>';
echo '<input type="hidden" name="miktar3">';
echo '<input type="hidden" name="durum">';
echo '<p class="product-barkod">Fiyat: <input type="text" name="fiyat" value="' . $row['fiyat'] . '"></p>';

echo '<p class="product-barkod">Tarih Seç: <input type="date" name="tarih"></p>
';





echo '<input type="hidden" name="urun_ismi2" value="' . $row['urun_ismi'] . '">';
echo '<input type="hidden" name="turu2"  value="' . $row['turu'] . '">';
echo '<input type="hidden" name="anavatani2" value="' . $row['anavatani'] . '">';
echo '<input type="hidden" name="iklim2" value="' . $row['iklim'] . '">';
echo '<input type="hidden" name="aciklama2" value="' . $row['aciklama'] . '">';
echo '<input type="hidden" name="gorsel" value="' . $row['gorsel'] . '">';
echo '<input type="submit" value="Stok Ekle">';
echo '</form>';

  $parahesap = $row['fiyat'] * $row['adet'];
echo ' Şuan toplam değeri (Stoktakilerin): ' . $parahesap . ' TL';




        
        echo '</div>';
    }
} else {
    echo "Ürün bulunamadı.";
}





}



?>
<script>

    /* özeti ise stok gösterirken eğer admin sayfamda stok geçmişi sayfamda ekledi çıkardı yazıyor ya
    orada bhnun kontrolunu yapıyorum eklenenleri ekledi çıkaranları  çıkardı yazıyor */



    // Form gönderimini dinle
    document.getElementById("myForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Formun varsayılan gönderimini engelle

        // Form elemanına referans al
        var form = document.getElementById("myForm");

        // İşlem türünü al
        var islem = form.querySelector('input[name="islem"]:checked').value;

        // Formdaki girdi alanlarına referans al
        var miktarorjinalInput = form.querySelector('input[name="miktarorjinal"]');
        var miktarInput = form.querySelector('input[name="miktar"]');

        // Girdi değerlerini al ve integer'a dönüştür (boşsa 0 olarak kabul et)
        var miktarorjinal = miktarorjinalInput.value !== "" ? parseInt(miktarorjinalInput.value) : 0;
        var miktar = miktarInput.value !== "" ? parseInt(miktarInput.value) : 0;
        var miktar3 = 0;

        // İşlem türüne göre miktarı hesapla ve durumu belirle
        if (islem === "ekle") {
            miktar3 = miktarorjinal + miktar;
            durum = "ekledi";
        } else if (islem === "cikar") {
            miktar3 = miktarorjinal - miktar;
            durum = "çıkardı";
        }

        // Hesaplanan sonucu ve durumu ilgili input alanlarına yaz
        form.querySelector('input[name="miktar3"]').value = miktar3;
        form.querySelector('input[name="durum"]').value = durum;

        form.submit(); // Formu gönder
    });
</script>




<style>
.product-details {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 500px;
  height: 600px;
  background-color: #f2f2f2;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
  margin: 10px auto;
}

.product-image {
  width: 140px;
  height: 140px;
  object-fit: cover;
  border-radius: 10%;
}

.product-title {
  margin-top: 5px;
  font-size: 15px;
  font-weight: bold;
}

.product-barkod,
.product-aciklama {
  margin-top: 5px;
  font-size: 14px;
  text-align: left;
}

.product-barkod input[type="text"],
.product-barkod textarea {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.product-aciklama textarea {
  height: 50px;
}

input[type="submit"] {
  margin-top: 5px;
  padding: 5px 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  
}

input[type="submit"]:hover {
  background-color: #45a049;
}

.buton{

 margin-top: 5px;
  padding: 5px 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;



}
.delete-form {
  display: flex;
  justify-content: flex-end;
  margin-top: 10px;
}

.delete-form input[type="submit"] {
  background-color: #f44336;
  color: white;
  border: none;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  border-radius: 4px;
  cursor: pointer;
}

.delete-form input[type="submit"]:hover {
  background-color: #d32f2f;
}

</style>
