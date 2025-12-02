  <?php
session_start(); // halk dili ile anlatırsam oturum verilerini tutuyorum burada 

// mesela giriş form ekranım vardı oradan verileri session şeklinde kayıt ettim yani oturum içinde

// bu sayede bunu istediğim sayfada çağırdığımda oturum verilerimi çıkış yapana kadar görebiliyorum
// ve işlem yapabiliyorum   işte oturumu yukarıda açtım ve kaydettiğimdeğişkenelere baktım eğer kullanıcı giriş
// yapmadısa yani telefon verisi yoksa index.php sayfasına git dedim yani burada iznin yok eğer başarılı ise yapmışsa
// session oturumundan değerleri aldım ve $user $isim değişkenlerine atadım alt kısımda html içinde de kullandım özetle


// Kullanıcının giriş yapıp yapmadığını kontrol ettim, giriş yapmamışsa giriş sayfasına yönlendirdim
if (!isset($_SESSION["telefon"])) {
  header("Location: index.php");
  exit();
}

// Oturumdan kullanıcı bilgilerini aldım
$user = $_SESSION["telefon"];
$isim = $_SESSION['isim'];

?>

 <!DOCTYPE html>
<html>
<head>
    <title>Ürün Ekle</title> <!-- bu başlık -->

    <!-- STYLE  KISMINDA TASARIM YAPIYORUZ YANİ MESELA BOYUTLAR RENKLER VB -->
<style> 
@import url('https://fonts.googleapis.com/css?family=Lexend+Deca&display=swap');

body {
    margin: 0;
    padding: 0;
    background: linear-gradient(
        #243545,
        #243545 var(--line-offset),
        #dedede var(--line-offset)
    );
    width: 100vw;
    height: 120vh;
    font-family: 'Lexend Deca', sans-serif;
    color: #878787;

    --menu-item-size: 50px;
    --green-color: #329680;
    --blue-color: #099c95;
    --dark-green-color: #175b52;
    --white-color: #FFF;
    --gray-color: #EDEDED;
    --container-width: 700px;
    --container-height: 770px;
    --line-offset: calc((100% - var(--container-height))/ 2 + var(--menu-item-size) + 0.6em);
}


.container {
    width: var(--container-width);
    height: var(--container-height);
    margin-left: -350px;
    margin-top: -200px;
    top: 32%;
    left: 50%;
    position: absolute;
    z-index: 1;
}

article {
   background: var(--gray-color);
   padding: 1em;
   border-radius: 0 0 5px 5px;
   box-shadow: 5px 5px 5px #CCC;
   position: relative;
   z-index: -1;
}

h1 {
    font-size: 115%;
    margin: 1em 2em;
    padding: 0;
    position: relative;
    color: #777;
}



.container2 {
  margin-left: 15%;
}

.form-container {
  width: 80%;
  
 
 
}

.form-container form {
  background-color: #f7f7f7;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.form-container label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;

}

.form-container input,
.form-container textarea,
.form-container select {
  width: 90%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-container input[type="submit"] {
  background-color: #4caf50;
  color: white;
  cursor: pointer;

}


.image-container {
  width: 40%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.image-container input[type="file"] {
  display: none;
}

.image-container .image-upload {
  border: 2px dashed #ccc;
  padding: 16px;
  border-radius: 8px;
  cursor: pointer;
}

.image-container .image-preview {
  width: 30%;
  height: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  border: 2px dashed #ccc;
  border-radius: 8px;
}

.image-container .image-preview span {
  color: #888;
  font-size: 14px;
}
</style>
</head>
<body>
  <div class="container"><br>
     <center> Ürün ekle</center> 

<br><br>
    

    <div class="container2">
    <div class="form-container">
      <form action="urunyolla.php" method="POST" enctype="multipart/form-data"> <!-- post methodu ile urunyolla.php yolla input ile girilen verileri

        mesela 
        <input  name="urun_ismi"> işte yazıyor ya. formda butona basım verileri urunyolla.php e yollluyorum ve bu name ile orada yakalyıp değerlerini kullanabiliyorum

         ----- burada urunyolla.php sayfasına bak detayları yazdım    -->


        <label for="urun_ismi">Ürün İsmi:</label>
        <input type="text" id="urun_ismi" name="urun_ismi" required><br><br>

         <?php 
        


include "baglanti.php";

// veri tabanımdan turu tablomdan ad sütünündan verileri alıyorum ardından döngü ile tek tek sıralıyorum select ile seçme şansı veriyorum kullanıcılara listeden ne demek istediğimi anlamak için  webten admine gir ardından urunekle sayfasıına
$sql_firmalar = "SELECT ad FROM turu";
$result_firmalar = $conn->query($sql_firmalar);

if ($result_firmalar->num_rows > 0) {
    echo '<label>Türü: </label><select name="turu">';
    
    while ($row_firma = $result_firmalar->fetch_assoc()) {
        $selected = ($row_firma['ad'] == $row['ad']) ? 'selected' : '';
        echo '<option name="turu" value="' . $row_firma['ad'] . '" ' . $selected . '>' . $row_firma['ad'] . '</option>';
    }
    
    echo '</select>';
}



?>




        <?php 


       // yukarıda yazdığımın aynısı 
         $sql_firmalar = "SELECT ad FROM hitap";
$result_firmalar = $conn->query($sql_firmalar);

if ($result_firmalar->num_rows > 0) {
    echo '<label>Kime hitap ediyor: </label><select name="anavatani">';
    
    while ($row_firma = $result_firmalar->fetch_assoc()) {
        $selected = ($row_firma['ad'] == $row['ad']) ? 'selected' : '';
        echo '<option name="anavatani" value="' . $row_firma['ad'] . '" ' . $selected . '>' . $row_firma['ad'] . '</option>';
    }
    
    echo '</select>';
}



        ?>
          
       
        
        <?php 



         $sql_firmalar = "SELECT ad FROM cinsiyet";
$result_firmalar = $conn->query($sql_firmalar);

if ($result_firmalar->num_rows > 0) {
    echo '<label>Cinsiyet </label><select name="iklim">';
    
    while ($row_firma = $result_firmalar->fetch_assoc()) {
        $selected = ($row_firma['ad'] == $row['ad']) ? 'selected' : '';
        echo '<option name="iklim" value="' . $row_firma['ad'] . '" ' . $selected . '>' . $row_firma['ad'] . '</option>';
    }
    
    echo '</select>';
}



        ?>




        <label for="aciklama">Hakkında:</label>
        <textarea id="aciklama" name="aciklama" required></textarea><br><br>

         
            <div class="image-container">
      <label for="gorsel" class="image-upload">
        <div class="image-preview">
          <span id="gorsel-isim">Görsel Yükle</span>
        </div>
      </label>
     <p  style="margin-left: 20px; font-size: 12px">  not: Lütfen Görseli Kare Formatında Atınız* </p>
  <input type="file" id="gorsel" name="gorsel" required><br><br> <!-- GORSEL İÇİN TYPE KISMINI FİLE YAPIYORUM BURASI ÖNEMLİ -->
    </div>

        <input type="submit" value="Gönder">
      </form>
    </div>
  
 

<script>
  var gorselInput = document.getElementById("gorsel");
  var gorselIsimSpan = document.getElementById("gorsel-isim");

  gorselInput.addEventListener("change", function() {
    
    gorselIsimSpan.textContent = "Görsel Seçildi";
  });

  // bu scripte gorselve gorsel-isim id takip ediyorum ve eğer seçtise oradaki yazıyı görsel seçildi oalrak değiştiriyorum
</script>
  </div>
</div>



<br><br><br><br>  <!-- boşluk -->


  </div>
  


</body>
</html>
