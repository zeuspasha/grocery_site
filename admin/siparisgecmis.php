<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stok eklenen kontrol</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<!-- arama yapmak için bu: bunu diğer sayfalarda açıkladım hatta çoğunu açıkladım o yüzden basit açıklama ekleyecem buraya -->
<script type="text/javascript">
function searchForElement() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("productTable");
  tr = table.getElementsByTagName("tr");

  for (i = 1; i < tr.length; i++) { // i=1 ile başlıyor, başlık satırını atlıyoruz
    td = tr[i].getElementsByClassName("urunismi")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<!-- ssss -->

<style>
table {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin: 20px 0;
}

th, td {
  text-align: left;
  padding: 8px;
   font-size: 13px;
}

th {
  background-color: #4285f4;
  color: white;
  font-size: 13px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
   font-size: 13px;
}

tr:hover {
  background-color: #ddd;
}

.kutu {
  display: flex;
}

.kutu div {
  margin: 10px;
  padding: 10px;
  
}

  .image-container {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100px;
    height: 100px;
 
    overflow: hidden;
  }

  .image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>
</head>
<body>


<!-- arama için altı -->
  <div style="text-align: center; background-color: #f2f2f2; padding: 10px;">
  <div style="display: inline-block; background-color: #fff; border-radius: 30px; padding: 10px; width: 70%;">
    <input type="text" id="searchInput" onkeyup="searchForElement()" placeholder="Ürün Barkoduna Göre Arama yapın..." style="border: none; outline: none; width: 80%; padding: 10px 15px; font-size: 16px;">
    <button type="button" onclick="searchForElement()" style="border: none; outline: none; background-color: transparent; font-size: 16px; cursor: pointer;"><i class="fa fa-search"></i></button>
  </div>
</div>
<!-- arama için üstü -->
<div class="kutu">
  <div>
    <form method="POST" action="">
     <style>
.kutu {
  margin-top: -20px;
    background-color: #f1f1f1;
    padding: 0px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: flex-start;
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

input[type="date"] {
    padding: 5px;
    border-radius: 5px;
    margin-left: 20px;
    border: 1px solid #ccc;
    margin-right: 10px;
    margin-bottom: 10px;
}

button[type="submit"] {
    padding: 10px 20px;
    border-radius: 5px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #4CAF50;
    color: white;
}
</style>

    
<div class="kutu">
  <form method="POST" action="">
    <label for="start">Başlangıç Tarihi:</label>
    <input type="date" id="start" name="start" required>
    <label for="end">Bitiş Tarihi:</label>
    <input type="date" id="end" name="end" required>
    <button type="submit" name="submit">Tarihe Göre Listele</button>
  </form>
<p style="padding-right: 650px;"></p>
</div>




<?php
include "../baglanti.php";

$sql = "SELECT barkod_kodu, fiyat, adet, tarih 
        FROM siparis ";




// Tarih aralığındaki verileri seç
if (isset($_POST['submit'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sql .= "WHERE tarih BETWEEN '$start' AND '$end' ";
}



$sql .= "ORDER BY barkod_kodu DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table id='productTable'>";
    echo "<tr><th>Sıra No</th><th>Barkod Kodu</th><th>Alım Adeti</th><th>Adet (Fiyatı)</th><th>TOPLAM Fiyat</th><th>Tarih</th></tr>";
    $counter = 1;
    $toplamfiyat = 0;
    $encoksatan = 0;
    $barkodkodusatan = "Barkod Kodu";
    while ($row = mysqli_fetch_assoc($result)) {

        $adetegore_fiyat =  $row["fiyat"] / $row["adet"];

         if ($barkodkodusatan == $row["barkod_kodu"] ) {
             $encoksatan += $row["adet"];
         }
         if ($encoksatan <= $row["adet"]){
             $encoksatan = $row["adet"];
             $barkodkodusatan =  $row["barkod_kodu"];

         }
        echo "<tr>";
        echo "<td>" . $counter . ")</td>";
        
        echo "<td class='urunismi'>" . $row["barkod_kodu"] . "</td>";
     
        echo "<td style='color: red; font-style: bold;  ' >" . $row["adet"] . "'Adet alınmış</td>";
        echo "<td style='color: red; font-style: bold;  '>" . $adetegore_fiyat  . "TL</td>";
        echo "<td style='color: red; font-style: bold;  '>" . $row["fiyat"] . "TL</td>";
          echo "<td style='color: red; font-style: bold;  '>" . $row["tarih"] . "TL</td>";
    
        echo "</tr>";
        $counter++;
        $toplamfiyat += $row["fiyat"];
    }
    echo "</table>";
} else {
    echo "Ürün Yok";
}



// Bağlantıyı kapat
mysqli_close($conn);
?>
</div>
</div>




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
                 <li class="menu__item"> <button onclick="cikisYap()" class="cikis" >👈 Geri Gel</button>
</li>

<script>
function cikisYap() {
  // Tarayıcıda ön belleği silmek için window.location.replace() yöntemini kullanıyoruz
  window.location.replace("index.php");
}
</script>


<!-- en alt -->


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



<!-- bu siperis geçmişi sayfam ve bu kısım sol alta çıkan yer

peki bu neden sol alta bunu nasıl belirledim dersen CSS İLE YANİ STYLE yani tasarım kodu ile bunun sitil kodunu bilerek hemen üste yaptım incelersein 


style>
  .form-container {
    position: fixed;
    top: 70%;
    right: 0;    mesela üsten aldım senin için right = 0 demek sağa 0 meselafa olsun sağ yapışşsın top 70% ise yukarıdan ekran oranına göre 70% uzakta olsun

    ve ek bilgi php de verileri ekrana yazdırmak için echo kullanılır

    mesela echo "ahmet"; b bu kod ekrana ahmet yazar

    ama php kpd nasol yazılır

    <?php   ?>   şeklinde ben echo "ahmet";  i bu php aralığına yazarsam ekrana onu yazar

    bu altta da değişkenleri ölçtüğüm verilerle ekrana basıyorum özetle

-->


<div class="form-container">
 <form method="post" action="">
    <label for="start_date">Tüm ürünlerden elde edilen para:</label>
    <?php if (!empty($toplamfiyat)) { ?>
        <strong><p style="color: green; font-size: 25px;"><?php echo $toplamfiyat; ?>TL</p></strong>
    <?php } else { ?>
        <strong><p style="color: red;">Şuan veri bulunamadı</p></strong>
    <?php } ?>

    <label for="start_date">En çok satan ürün ve adeti:</label>
    <?php if (!empty($barkodkodusatan) && !empty($encoksatan)) { ?>
        <strong><p style="color: green;"><?php echo 'Barkodu: ' . $barkodkodusatan . '<br>Satılan Adet: ' . $encoksatan; ?></p></strong>
    <?php } else { ?>
        <strong><p style="color: red;">Şuan veri bulunamadı</p></strong>
    <?php } ?>
</form>

</div>