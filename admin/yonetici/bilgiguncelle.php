<?php  

if (isset($_POST['urun_id'])) {
    $urun_id = $_POST['urun_id'];
    
    // Veritabanı bağlantısı için gerekli bilgiler
   
include "../../baglanti.php";



    $sql = "SELECT * FROM yonetici WHERE telefon= '$urun_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product-details">';
            echo '<img src="https://is2-ssl.mzstatic.com/image/thumb/Purple125/v4/e4/c2/6c/e4c26c82-bf71-4634-3751-e24419c01120/AppIcon-0-0-1x_U007emarketing-0-0-0-7-0-0-sRGB-0-0-0-GLES2_U002c0-512MB-85-220-0-0.png/1200x600wa.png" alt="' . $row['isim'] . '" class="product-image">';
            
            echo '<form method="post" action="guncelle.php">';
            
            echo '<p class="product-barkod">İsim: <input type="text" name="isimm" value="' . $row['isim']  . '"></p>';
            echo '<p class="product-barkod">Telefon: <input type="text" name="telefonn" value="' . $row['telefon'] . '"></p>';
            echo '<p class="product-barkod">Şifre: <input type="text" name="pinn" value="' . $row['pin'] . '"></p>';
            echo '<p class="product-barkod">En son Güncellenen Tarih: <input type="text" name="miktar" value="' . $row['tarih'] . ' "readonly></p>';
            
            echo '<input type="submit" value="Güncelle">';
            echo '</form>';
            // Silme butonu ekleme
     
  
  
            echo '</div>';
        }
    } else {
        echo "Ürün bulunamadı.";
        echo "$urun_id";
    }
}







?>
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
  width: 200px;
  height: 200px;
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
