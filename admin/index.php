<?php
  session_start(); // Oturumu başlat

if (!isset($_SESSION["telefon"])) {
    // Telefon değeri tanımlanmamış ise
    // İstenilen işlemleri buraya yazabilirsiniz
    // Örneğin:
    header("Location: ../index.php");
  exit();
    
} else {
    // Telefon değeri tanımlanmış ise
   // Oturumdan kullanıcı bilgilerini alın
$user = $_SESSION["telefon"];
$isim = $_SESSION['isim'];

}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yönetici Paneli</title>
 <!-- Tarayıcıya ekran genişliğine duyarlı olmasını söyle -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- güzel yazı için -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
<!-- Tema stili ----------->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Tarih aralığı seçici -->
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
<!-- Google Font: Source Sans Pro -->

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- üst kısımda çıkan yer başlangıcı-->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

   
  </nav>
  <!-- üst kısmın sonu  -->

  <!-- bu hareketli yan bar admin panelde  -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#Senigördüğümesevindim" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> <!-- opacity opaklığı saydamlık yani -->
      <span class="brand-text font-weight-light">Sipariş Yönetici</span>
    </a>

    <!--  -->
    <div class="sidebar">
      <!-- yandaki barda görselin olduğu kısım bu altı .jpgli olan -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
                      <?php 
/* veri tabanını include ile bağladık
veri tabanı dosyalarım bağlantı.php içinde

ama bu klasorde değil bir önceki geri klasorde o yüzden baglanti.php yerine ../baglanti.php
yazpıyoruz bu klasorde değil bir ömnceki demek 

eğer 2 olsydao ../../baglantı.php uapcaktık

*/

include "../baglanti.php";

// SQL sorgusu oluşturma yonetici tablomdan isim sütünunu seçiyorum
$sql = "SELECT isim FROM yonetici";

// Sorguyu çalıştır ve sonucu al
$result = $conn->query($sql);

// Eğer sonuç kümesinde veri varsa
if ($result->num_rows > 0) {
    // İlk satırı al ve assoziatif dizi olarak sakla
    $row = $result->fetch_assoc();
    
    // "isim" sütunundaki değeri al
    $isim = $row["isim"];
}

// Veritabanı bağlantısını kapatma
$conn->close();
?>




          <a href="#" class="d-block"><?php echo $isim?></a>  <!-- isim değerini echo ile ekrana basıyoruz -->
        </div>
      </div>

      <!-- solda olan menü -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sayfalar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anasayfa</p>
                </a>
              </li>
            
            </ul>
          </li>
          <li class="nav-item">
            <a href="../urunekle.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Ürün Ekle
                <span class="right badge badge-danger">Yeni!</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Ürünler
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="stokeklenenkontrol.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürünleri Kontrol Et</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../urunekle.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürün Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="siparisler.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siparişler</p>
                </a>
              </li>
             
             -
            </ul>
          </li>
       
           
          <li class="nav-item has-treeview">
            <a href="firmaekle.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Firma Ekle
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
          </li>
         
          <li class="nav-item has-treeview">
            <a href="yonetici/bilgiguncelle.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                  <form method="post" action="yonetici/bilgiguncelle.php">
       <input type="hidden" name="urun_id" value="<?php echo "$user" ?>">
       
       <input type="submit" value="Profilini Düzenle" class="edit-button">

        </form>

                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            



          </li>
          <li class="nav-header"><?php echo "$user" ?></li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- bu artın yan ve üst menü dışında kalan menü ana kısım -->
  <div class="content-wrapper">
   
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Yönetici</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ana Sayfa</a></li>
              <li class="breadcrumb-item active">Kontrol</li>
            </ol>
          </div>
        </div><!-- -->
      </div>
    </div>
    <!-- bu kodlar şuydu solda açılır menü vardı üste de menü ve üstün bir altında beyaz bir menümsü yer var sağ kısımda yazı olan orasıydı

    şimdi orayı da bitirdik alt kısma giriyoruz asıl önemli yere  -->

    <!-- ANA KISIM BAŞLANGIÇ -->
    <section class="content">
      <div class="container-fluid">
      
        <div class="row"> <!---- BU DİV YANİ KUTULARDAN OLUŞTURDUĞUM ALANI ENLEMESİNE SIRALYACAM SONRA ALT SATIRA BUNUN GİBİ TEKRAR YAPICAM SIRALI OLUCAK BU KISMI ANLAMAN İÇİN ADMİN PANELE GİRDİĞİNDE HANİ YAN YANA SIRALI KUTULAR ÇIKIYOR SONRA ALTA İNİYOR ALTTADA SIRALI OLUYOR YA ORASININ MANTIĞI BU AMA ŞUAN BU KISIMDA ÜSTÜ SIRALAYCAM İLK BU KISMI BAŞLANGIÇ KISMI -->
          <div class="col-lg-3 col-6">
            <!-- İLK KUTU -->
           <a href="../urunekle.php" class="small-box-footer"> <div class="small-box bg-info">
              <div class="inner">
                <?php
                 
include "../baglanti.php";

// SQL sorgusunu hazırla ve urunler adında (sutunu) bir alanı say yani o sütünda kaç tane veri ver say
$sql = "SELECT COUNT(*) as urunler FROM urunver";

// Sorguyu çalıştır ve sonucu al
$result = $conn->query($sql);

// Eğer sonuç kümesinde veri varsa
if ($result->num_rows > 0) {
    // İlk satırı al ve assoziatif dizi olarak sakla
    $row = $result->fetch_assoc();
    
    // "urunler" adındaki alanın değerini al yani 20 satır varsa 20 yazıcak
    $urunler = $row["urunler"];
}

// Veritabanı bağlantısını kapatma
$conn->close();
?>

                <h3><?php  echo $urunler?></h3> <!-- işte burada yazıcak -->

                <p>Ürün Ekle</p> <i class="fas fa-arrow-circle-right"></i>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             
            </div>
          </div></a>
          <!-- ilk kutunun sonu -->
         
           <div class="col-lg-3 col-6">
            <!-- ikinci kutu -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Stok<sup style="font-size: 20px"></sup></h3>

                <p>Takip</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="stok.php" class="small-box-footer">Daha Fazla <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <!-- 2.kutu son -->





          <!-- 3.olan   -->


                 <div class="col-lg-3 col-6">
           
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Firma<sup style="font-size: 20px"></sup></h3>

                <p>Ekle</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="firmaekle.php" class="small-box-footer">Daha Fazla <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>







          <!-- 3.olan son-->




          <!-- 4..olan  -->


               
 <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="stokeklenenkontrol.php" class="small-box-footer">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Ürün Geçmişi</h3>

                <p>Eklenen Ürünler</p> <i class="fas fa-arrow-circle-right"></i>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
          
            </div>
          </div> </a>







          <!-- 4.olan son -->








        </div>
        <!-- /.row ---------  yani bu kısımda o satırı bıtırdım simdi alt satıra  geçicem orada da tekrar sıralı yapcıam kutualrı-->
       






         
            <div class="container-fluid">
        
        <!-- BAŞLIYORUM SIRALAMAYA -->
        <div class="row">
         
        
     

          <!-- alt kutu 1  -->
        

          <div class="col-12 col-sm-6 col-md-3">
            <a href="siparisler.php"><div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                  

                            <?php 
// Bağlantı dosyasını dahil et
include "../baglanti.php";

// SQL sorgusunu hazırla ve siparis tablosundaki siparişlerin sayısını toplam_siparis adında bir alan olarak seç
$sql = "SELECT COUNT(*) AS toplam_siparis FROM siparis";

// Sorguyu çalıştır ve sonucu al
$result = $conn->query($sql);

// Eğer sonuç kümesinde veri varsa
if ($result->num_rows > 0) {
    // İlk satırı al ve assoziatif dizi olarak sakla
    $row = $result->fetch_assoc();
    
    // "toplam_siparis" adındaki alanın değerini al
    $toplam_siparis = $row["toplam_siparis"];
} else {
    // Sonuç kümesinde veri yoksa, toplam sipariş sayısını 0 olarak ayarla
    $toplam_siparis = 0;
}



// Veritabanı bağlantısını kapatma
$conn->close();
?>

              <div class="info-box-content">
                <span class="info-box-text">Siparişler</span>
                <span class="info-box-number"><?php echo $toplam_siparis  ?></span>
              </div>
              
            </div></a>
            <!-- alt 1 kutu son -->
          </div>
          
    
 <!-- sipariş geçmiş kısmı  yani kutu 2-->

  <div class="col-12 col-sm-6 col-md-3">
            <a href="siparisgecmis.php"><div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                  

                            <?php 
include "../baglanti.php";

$sql = "SELECT COUNT(*) AS toplam_siparis FROM siparis";
$result = $conn->query($sql);

// Sipariş sayısını alma
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $toplam_siparis = $row["toplam_siparis"];
} else {
    $toplam_siparis = 0;
}




// Veritabanı bağlantısını kapatma
$conn->close();
?>

              <div class="info-box-content">
                <span class="info-box-text">Ürün SATIM Arşivi</span>
                <span class="info-box-number">Şuana kadar satılan Adet: <?php echo $toplam_siparis  ?></span>
              </div>
             
            </div></a>
            <!-- alt 2.kutu son -->
          </div>
          


        </div>
        <!-- alt satır sıralma son 2 kutu yeter başka kutu eklenırse bu divin üstüne eklencek-->



           




     
   
</div>

           
            
          </section>
         
        </div>
      
      </div>
    </section>
   
  </div>
  
    

  <!-- alt kısımda yazan footer bunun için kullanilir diye biliirm -->
  <footer class="main-footer">
    <strong><a></a>Admin Sitesinde bulunuyorsunuz</strong>
   
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">

  </aside>

</div>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  // jQuery UI'nin button widgetini jQuery'nin button öğesiyle kullanılabilir hale getir
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
<style type="text/css">

.icons {
  position: fixed;
  top: 80%;
  right: 20px;
  font-size: 45px;
   background-color: rgba(0, 120, 20, 0.6);
  border-radius: 50%;
  cursor: pointer;
  z-index: 2;
  width: 67px;
}

.dropdown {
  position: fixed;
  top: 62%;
  right: 20px;
  width: 100px;
  padding: 10px;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  border-radius: 5px;
  display: none;
   z-index: 2;
}

.dropdown__content {
  list-style-type: none;
  margin: 0;
  padding: 0;
   z-index: 2;
}

.dropdown__content li {
  margin-bottom: 10px;
}

.cikis {
  background-color: rgba(0, 100, 20, 0.6);
  color: #ffffff;
  padding: 4px 8px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
   z-index: 2;
  transition: background-color 0.3s ease;
}

.cikis:hover {
  background-color: #cc0000;
}
</style> <div class="icons" onclick="toggleDropdown()">👋🏻</div>
<div class="dropdown" id="dropdown">
  <ul class="dropdown__content">
    <li class="menu__item">
      <p style="font-size:12px;" >Merhaba <?php echo"$isim"; ?> Hoşça Kal</p>
    </li>
    <li class="menu__item">
      <button onclick="cikisYap()" class="cikis">Çıkış Yap</button>
    </li>
     
    
  </ul>
</div>

<script>
function toggleDropdown() {
  var dropdown = document.getElementById("dropdown");
  if (dropdown.style.display === "none") {   // none gizlemej için kullanır yani ekranda gözükmesin
    dropdown.style.display = "block";  // aktif etmek için buda
  } else {
    dropdown.style.display = "none";
  }
}

function cikisYap() {
  window.location.replace("../gec.php");  // çikis yap dedise ../gec.php gitsin
}
</script>
