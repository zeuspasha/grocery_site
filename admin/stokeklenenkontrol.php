<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stok eklenen kontrol</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<!-- arama yapmak için bu: -->
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


/* bu üsteki script kodu search mantığı yani arama yapıyor getelementbyid yazıyor ya oaradan aşağdaı verilerdeki id değerlerni takip ediyor ve  tablo ile listeletiğin ekran çıktısı kısmında tr ve "urunismi" classıma göre arama yapıyor

mesela örnek

<p class="urunismi"> </p> */



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


<!-- arama için altı  buradan kullanıcıdan girdi alıyoruz yani input ile girdiği alıyor style".." kısmıylada tasarım yapıyoruz-->
  <div style="text-align: center; background-color: #f2f2f2; padding: 10px;">
  <div style="display: inline-block; background-color: #fff; border-radius: 30px; padding: 10px; width: 70%;">
    <input type="text" id="searchInput" onkeyup="searchForElement()" placeholder="Ürün İsmine Göre Arama yapın..." style="border: none; outline: none; width: 80%; padding: 10px 15px; font-size: 16px;">
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
<form style="float: right;" method="POST" action="">
    <?php
include "../baglanti.php";

/* "firma" sütunundaki verileri al bunu başka sayfada mantığını açıklamıştım ama tekrar yazayım
urunver tablomdan firma sütünündaki verileri alıyor eğer varsa kontrol ediyoruz sonra varsa döngüye alıp listeliyoruz */
$sql = "SELECT DISTINCT firma FROM urunver";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Verileri bir döngü aracılığıyla listeleyin
    echo '<select style="margin-left: 250px;" id="firma2" name="firma2" required>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['firma'] . '">' . $row['firma'] . '</option>';
    }
    echo '</select>';
} else {
    echo "Kayıt bulunamadı.";
}

// Veritabanı bağlantısını kapat
mysqli_close($conn);
?>
  
    <button type="submit" name="sirket">Şirkete Göre Listele</button>
</form>


</div>




<?php
include "../baglanti.php";
// stokkont tablomdan select ile urun_ismi, turu, iklim.... tablolarını seçiyorum yani oradaki verileri alıcam
$sql = "SELECT urun_ismi, turu, anavatani, iklim, aciklama, barkod_kodu, adet, firma, fiyat, fiyatson, tarih, gorsel, durum 
        FROM stokkont ";

/* Tarih aralığındaki verileri seç yukarıda div vardı 175.satırda oradan tarih verilerini alıyorduk form içinde onun verilerini burda alıyoruz ve filrtrememek için kullanıcaz
        
        ardından BETWEEN ile tablomuzdaki tarih sütünü ile karşılaştırıypruz girilen tarih aralığını 

        */
if (isset($_POST['submit'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sql .= "WHERE tarih BETWEEN '$start' AND '$end' "; /* bu kısımda */
}

// Şirkete göre verileri seç
if (isset($_POST['sirket'])) {   /* burada da şirketi yapıyoruz seçtiğim veriden aynı mantık özetle en sonda var olanları while ile listeliyoruz */
    $firma2 = $_POST['firma2'];

    if (isset($_POST['submit'])) {
        $sql .= "AND ";
    } else {
        $sql .= "WHERE ";
    }

    $sql .= "firma = '$firma2' ";
}

$sql .= "ORDER BY urun_ismi DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table id='productTable'>";
    echo "<tr><th>Sıra No</th><th>Ürün İsmi</th><th>Türü</th><th>Anavatanı</th><th>İklim</th><th>Hakkında</th><th>Barkod Kodu</th><th>Firma</th><th>Alım Adeti</th><th>Afet (Fiyatı)</th><th>Toplam Aldığı Fiyat</th><th>Tarih</th><th>Durum</th><th>Görsel</th></tr>";
    $counter = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $counter . ")</td>";
        echo "<td class='urunismi'>" . $row["urun_ismi"] . "</td>";
        echo "<td>" . $row["turu"] . "</td>";
        echo "<td>" . $row["anavatani"] . "</td>";
        echo "<td>" . $row["iklim"] . "</td>";
        echo "<td>" . $row["aciklama"] . "</td>";
        echo "<td>" . $row["barkod_kodu"] . "</td>";
        echo "<td>" . $row["firma"] . "</td>";
        echo "<td style='color: red; font-style: bold;  '>" . $row["adet"] . "'Adet alınmış</td>";
        echo "<td style='color: red; font-style: bold;  '>Alım Fiyatı " . $row["fiyat"] . "TL</td>";
        echo "<td style='color: red; font-style: bold;  '>TOPLAM FİYATI " . $row["fiyatson"] . "TL</td>";
        echo "<td>" . $row["tarih"] . "</td>";
         if ($row["durum"] === "ekledi" ){
        echo "<td style='color: red;' > " . $row["durum"] . "</td>";}

        else{

        echo "<td style='color: blue;' > " . $row["durum"] . "</td>";

        }
        echo "<td><img src='../urungorsel/" . $row["gorsel"] . "' height='100' width='100'></td>";
        echo "</tr>";
        $counter++;
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
