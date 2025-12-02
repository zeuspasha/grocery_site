
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<!-- arama yapmak için bu: bunu stokeklenenkontrol.php sayfamda açıkladım  aslında bu sayfanın çoğunu orada açıkladım -->
 <script type="text/javascript">
      function searchForElement() {
        var input, filter, ul, li, embed, p, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        ul = document.getElementsByClassName("product-list")[0];
        li = ul.getElementsByClassName("product-box");

        for (i = 0; i < li.length; i++) {
          embed = li[i].getElementsByTagName("h3")[0];
          p = li[i].getElementsByTagName("h3")[0];
          txtValue = embed.textContent || embed.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
            var step = 0;
            
            var interval = setInterval(function() {
              li[i].style.transform = "translateY(-" + step + "px)";
              step += 5;
              if (step >= li[i].offsetHeight) clearInterval(interval);
            }, 10);
          } else {
            li[i].style.display = "none";
          }
        }
      }
    </script>
<!-- ssss -->

 
<style>
      /* Main styles */
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
      }
    
.product-list {
  display: flex;
  flex-wrap: wrap;
}

.row {
  display: flex;
}

.product-box {
  flex: 1 0 10%;
  margin: 10px;
  padding: 10px;
  background-color: white;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  text-align: center;
  width: 150px;
}

.product-image {
  width: 100px; /* istediğiniz genişlik değeri */
  height: 100px; /* istediğiniz yükseklik değeri */
  object-fit: cover;
  object-position: center;
}
.product-title {
  font-size: 16px;
  margin-top: 10px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.product-barkod {
  font-size: 14px;
  color: gray;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.edit-button {
  background-color: #4caf50;
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

.edit-button:hover {
  background-color: #45a049;
}


</style>

  </head>
  <body>

<!-- arama için altı -->
  <div style="text-align: center; background-color: #f2f2f2; padding: 10px;">
  <div style="display: inline-block; background-color: #fff; border-radius: 30px; padding: 10px; width: 70%;">
    <input type="text" id="searchInput" onkeyup="searchForElement()" placeholder="Ürün İsmine Göre Arama yapın..." style="border: none; outline: none; width: 80%; padding: 10px 15px; font-size: 16px;">
    <button type="button" onclick="searchForElement()" style="border: none; outline: none; background-color: transparent; font-size: 16px; cursor: pointer;"><i class="fa fa-search"></i></button>
  </div>
</div>
<!-- arama için üstü -->

<br>






















<?php
include "../baglanti.php";









// 1) Tarih aralığı girişini al
if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
 echo "<center> Seçili Tarih Aralığı $start_date - $end_date </center>";
    

    // 2) urunver veritabanı tablosundan gerekli verileri al ve tarih aralığına göre sorgula
  
$sql = "SELECT id, urun_ismi, barkod_kodu, gorsel FROM urunver WHERE tarih BETWEEN '$start_date' AND '$end_date'";
$result = $conn->query($sql);



// Verileri listeleme
if ($result->num_rows > 0) {
    echo '<div class="product-list">';
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        if ($i % 3 == 0) {
            echo '<div class="row">';
        }
        
        echo '<div class="product-box">';
        echo '<form method="post" action="stokgoster.php">';
        echo '<input type="hidden" name="urun_id" value="' . $row['id'] . '">';
        echo '<img src="../urungorsel/' . $row['gorsel'] . '" alt="' . $row['urun_ismi'] . '" class="product-image"><hr>';
        echo '<h3 class="product-title"><br> ' . $row['urun_ismi'] . '</h3>';
        echo '<p class="product-barkod">Barkod:<br> ' . $row['barkod_kodu'] . '</p>';
        echo '<input type="submit" value="Stok Ekle" class="edit-button">';
        echo '</form>';
        echo '</div>';
        $i++;
        if ($i % 3 == 0) {  // 3 er 3 er listelemek için 
            echo '</div>';
        }
    }
    echo '</div>';
    if ($i % 3 != 0) {
        echo '</div>';
    }
}


 else {
 
    echo "<center>Kayıt bulunamadı.</center>";
}
 


} else {



$sql = "SELECT id, urun_ismi, barkod_kodu, gorsel FROM urunver";
$result = $conn->query($sql);


// Verileri listeleme
if ($result->num_rows > 0) {
    echo '<div class="product-list">';
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        if ($i % 3 == 0) {
            echo '<div class="row">';
        }
        echo '<div class="product-box">';
        echo '<form method="post" action="stokgoster.php">';
        echo '<input type="hidden" name="urun_id" value="' . $row['id'] . '">';
        echo '<img src="../urungorsel/' . $row['gorsel'] . '" alt="' . $row['urun_ismi'] . '" class="product-image"><hr>';
        echo '<h3 class="product-title"><br> ' . $row['urun_ismi'] . '</h3>';
        echo '<p class="product-barkod">Barkod:<br> ' . $row['barkod_kodu'] . '</p>';
        echo '<input type="submit" value="Stok Ekle" class="edit-button">';
        echo '</form>';
        
        echo '</div>';
        $i++;
        if ($i % 3 == 0) {  // 3 er 3 er mantığı 
            echo '</div>';
        }
    }
    echo '</div>';
    if ($i % 3 != 0) {
        echo '</div>';
    }
}


}











// Veritabanı bağlantısını kapatma
$conn->close();
?>




<!--önemsiz o yüzden alta kalabilir sabitlecem sol üste -->
 

<style type="text/css">
  .cikis {
 background-color: rgba(0, 0, 50, 0.6);
  color: #ffffff;
  padding: 10px 20px;
  position: fixed;
  top: 1%;
  left: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.cikis:hover {
  background-color: #cc0000;
}
</style>
                 <button onclick="cikisYap()" class="cikis" >👈 Geri Gel</button>


<script>
function cikisYap() {
  // Tarayıcıda ön belleği silmek için window.location.replace() yöntemini kullanıyoruz
  window.location.replace("index.php");
}
</script>

<style>
  .form-container {
    position: fixed;
    top: 70%;
    right: 0;
    padding: 10px;
    background-color: #f2f2f2;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    font-family: Arial, sans-serif;
  }

  .form-container label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  .form-container input[type="date"] {
    display: block;
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
    border-radius: 3px;
    border: 1px solid #ccc;
  }

  .form-container input[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }
</style>

<div class="form-container">
  <form method="post" action=""> <!-- girdi alıyorum action"" actionun içi boş demek bu sayfaya form berilerini yolladım yukarıda da yakaladım veriyi  eğer action"ahmet.php" olsaydı ahmet.php sayfasına verileri yolladım demek olurdu -->
    <label for="start_date">Başlangıç Tarihi:</label>
    <input type="date" name="start_date" required>
    <label for="end_date">Bitiş Tarihi:</label>
    <input type="date" name="end_date" required>
    <input type="submit" value="Filtrele">
  </form>
</div>



  </body>
</html>


