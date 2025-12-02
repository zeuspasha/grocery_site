<?php

include 'baglanti.php';
session_start();

// bunları urunekle.php de açıkladım


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- tatlı uyarı (Sweet Alert) -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- aos animasyonu -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- yükleme çubuğu -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="./css/flash.css">
    <title>Giriş</title> <!-- başlık -->
</head>


<body>
    <!--  gorsel bu giriş sayfasındaki görseller 2 tane sıralı şekilde kayan -->
    <section id="carouselExampleControls" class="carousel slide carousel_section" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="carousel-image" src="./gorsel/market1.jpg"> <!-- gorsel için img kullanılır src de yolunu belirttir yani nerede olduğunu -->
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./gorsel/market2.jpg">
            </div>
           
        </div>
    </section>

   <!-- ana bölüm -->
<section id="auth_section">

    <div class="logo">
      
        <p>Bakkal Sistemi Giriş</p>
    </div>

    <div class="auth_container">
        <!--============ giriş yap =============-->

        <div id="Log_in">
            
            <div class="role_btn">
                <div class="btns active">Personel</div>
                
            </div>

            <!-- // ==kullanıcı girişi== -->
            <?php 



            /* burada formdan verileri yolladım yani giriş yap dedim if(isset($_POST...)) kısmı butona tıkladığında tıklandı mı onu kontrol ediyor yani değeri var mı değeri varsa tıklanmıştır


            ardında tıklandı ise çalışıyor if kısmı   ve değişkenlere atanıyor form içindeki girilen <input> takı verilr sonra veri tabanımızda 

            // SQL sorgu oluşturma yazıyor orada da yonetici tablomdan select * ile hepsini seçiyorum tüm sutunları sonra
            isim ve telefon ve pin sütünları ile eşleşip eşleşmediğine bakıyorum eğer veriler eşlleiyorsa doğru girdisem beni alt ksımında gördiğin gibi admin/index.php sayfasına yolluyor */


            if (isset($_POST['giriskontrol'])) {
                // POST verilerini al
            $isim = $_POST['isim'];
            $telefon = $_POST['telefon'];
            $sifre = $_POST['sifre'];

            // SQL sorgusu oluşturma
            $sql = "SELECT * FROM yonetici WHERE isim = '$isim' AND telefon = '$telefon' AND pin = '$sifre'";
            $result = $conn->query($sql);

            // Kullanıcının doğrulamasını kontrol etme
            if ($result->num_rows > 0) {
                // Giriş doğruysa telefon bilgisini anasayfa.php'ye gönderme
                session_start();
                $_SESSION['telefon'] = $telefon;
                $_SESSION['isim'] = $isim;
                //header("Location: anasayfa.php");
                header("Location: admin/index.php");
                exit();
            } else {
                // Giriş yanlışsa hata mesajı gösterme
                echo "Giriş başarısız. Lütfen tekrar deneyin.";
            }

            }
            ?>





        <!-- input ile verileri alıyoruz inputa girilen veriler  name="..." değişkenine atanıyor mesela

            name""isim" ise   içinde girdiğim değeri kullanırken "isim" değişkenindeki veriyi okumam gerekiyor

        -->
        
            <form class="user_login authsection active" id="userlogin" action="" method="POST">
                <div class="form-floating">
                    <input type="text" class="form-control" name="isim" placeholder=" ">
                    <label for="Username">Kullanıcı Adı</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="telefon" placeholder=" ">
                    <label for="Email">Telefon</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="sifre" placeholder=" ">
                    <label for="Password">Şifre</label>
                </div>
                <button type="submit" name="giriskontrol" class="auth_btn">Giriş Yap</button>

                <div class="footer_line">
                    <h6>Bakkal Sistemine <span class="page_move_btn" onclick="#"> Hoşgeldiniz</span></h6>
                </div>
            </form>

                
               
               
                
            </div>


         
    </section>
</body>


<script src="./javascript/index.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- aos animation-->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>



<style type="text/css">
  .cikis {
 background-color: rgba(200, 200, 200, 0.6);
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
  window.location.replace("gec.php");
}
</script>


</html>



