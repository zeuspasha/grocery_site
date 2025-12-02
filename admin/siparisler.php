 





<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<!-- arama yapmak için bu: bunu diğer kodlard açıkladım sanırım stokeklenenkontrol.php de -->
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
    border-radius: 10px;
  flex: 1 0 10%;
  margin: 10px;
  padding: 10px;
  background-color: white;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  text-align: center;
  width: 200px;
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

  .container {
            display: flex; /* Flexbox kullanarak iç elemanları yan yana diz */
        }
        .left {
            width: 40%; /* Sol div %60 genişlik */
            background-color: lightblue; /* Arka plan rengi */
            padding: 20px; /* İçerik ve kenarlık arasında boşluk */
        }
        .orta {
            width: 30%; /* Sağ div %40 genişlik */
            background-color: lightcoral; /* Arka plan rengi */
            padding: 20px; /* İçerik ve kenarlık arasında boşluk */
        }
        .right {
            width: 30%; /* Sağ div %40 genişlik */
            background-color: lightblue; /* Arka plan rengi */
            padding: 20px; /* İçerik ve kenarlık arasında boşluk */
        }




        .butonlar {
        display: flex;
        flex-wrap: wrap;
        width: 400px; /* Konteyner genişliği */
    }
    .button {
        background-color: #4CAF50; /* Buton arkaplan rengi */
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px;
        cursor: pointer;
        width: 48%; /* Buton genişliği */
    }


      table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .remove-btn {
            color: red;
            cursor: pointer;
        }



.notification-container {
    position: fixed;
    top: 50px; /* Ekrandan ne kadar aşağıda başlayacağı */
    left: 50%;
    transform: translateX(-50%);
    z-index: 9999;
}

.notification {
    display: flex;
    align-items: center;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    padding: 12px 20px;
    max-width: 400px;
}

.notification img {
    width: 32px;
    height: 32px;
    margin-right: 12px;
}

.notification p {
    flex-grow: 1; /* İçerik uzasın */
    margin: 0;
}

.confirm-button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-left: 12px;
    cursor: pointer;
    border-radius: 4px;
    transition-duration: 0.4s;
}

.confirm-button:hover {
    background-color: #45a049;
}

</style>

  </head>
  <body>



<!-- arama için altı bunu sanırım stokeklenenkontrol.php de açıkladım -->
  <div style="text-align: center; background-color: #f2f2f2; padding: 10px;">
  <div style="display: inline-block; background-color: #fff; border-radius: 30px; padding: 10px; width: 70%;">
    <input type="text" id="searchInput" onkeyup="searchForElement()" placeholder="Ürün İsmine Göre Arama yapın..." style="border: none; outline: none; width: 80%; padding: 10px 15px; font-size: 16px;">
    <button type="button" onclick="searchForElement()" style="border: none; outline: none; background-color: transparent; font-size: 16px; cursor: pointer;"><i class="fa fa-search"></i></button>
  </div>
 
     
<button id="fiyatbutonu" class="confirm-button" > Fişi Oluştur </button> <!-- buna bastığında  id="fiyatbutonu" verisine göre aşğıda işlem yapıcam script kodu ile --> 

 
</div>
<!-- arama için üstü -->

<br>

 <div class="container">
        <div class="left">

<?php
// Veritabanı bağlantısı için değişkenler
include "../baglanti.php";
// urunver veri tabanı tablosundan gerekli verileri al
$sql = "SELECT * FROM urunver";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="product-list">';
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $urun_ismi = $row["urun_ismi"];
        $gorsel = $row["gorsel"];
        $barkod_kodu = $row["barkod_kodu"];
        $adet = $row["adet"];
        $fiyat = $row["fiyat"];
        
       

        // Sonuçları ekranda göster
        if ($i % 3 == 0) {
            echo '<div class="row">';
        }
        echo '<div class="product-box">';
        echo '<input type="hidden" name="urun_id" value="' . $row['id'] . ' ">';
        echo '<img src="../urungorsel/' . $gorsel . '" alt="' . $urun_ismi . '" class="product-image"><hr>';
        echo '<h3 class="product-title"><br> ' . $urun_ismi . '</h3>';
        echo '<p class="product-barkod">Barkod Kodu: ' . $barkod_kodu . '</p>';
        echo '<p class="product-barkod">Toplam Adet:<strong style="color: red;"> ' . $adet . '</strong></p>';
        echo '<p class="product-barkod">Fiyat: <strong style="color: green;">' . $fiyat . 'TL</strong></p>';
       
   
        echo '<button class="add-button" data-name="' . $urun_ismi . '" data-price="' . $fiyat . '" data-barkod="' . $barkod_kodu . '">Seç</button>';
        echo '</div>';
        $i++;
        if ($i % 3 == 0) { // 3 er 3 er mantığı
            echo '</div>';
        }
    }
    echo '</div>';
    if ($i % 3 != 0) {
        echo '</div>';
    }
}

// Veritabanı bağlantısını kapat
$conn->close();
?>



        </div>
        <div class="orta">
            <h3>Ürün Miktarı Girin</h3>
            <input type="text" id="inputArea" placeholder="Miktar girin" style="font-size: 16px; padding: 10px; width: 100%;">
            <p>Seçili Ürün: <span id="selectedProduct"></span></p>
            <input type="hidden" id="selectedPrice"> <!-- type hidden demek gizli olarak orada var ama ekranda gözükmüyor
                mesela bu varmış ve id="selectedPrive kullarak bir şey yapıcam diyor belli alt script kodumda kullanıcam " -->
            <input type="hidden" id="selectedbarkod">
            

    <hr>
    <div class="butonlar">
        <!-- Butonlar 0'dan 9'a kadar -->
        <button class="button">0</button>
        <button class="button">1</button>
        <button class="button">2</button>
        <button class="button">3</button>
        <button class="button">4</button>
        <button class="button">5</button>
        <button class="button">6</button>
        <button class="button">7</button>
        <button class="button">8</button>
        <button class="button">9</button>
    </div>

    <script>
        // Tüm butonları seç ve her birine tıklama olayı ekle
        document.querySelectorAll('.button').forEach(button => {
            button.addEventListener('click', function() {
                const inputArea = document.getElementById('inputArea');
                inputArea.value += this.textContent; // Butonun içindeki metni input alanına ekle
            });
        });
    </script>
<button id="confirmButton">Ekle Sisteme</button>

        </div>
        <div class="right">
            <table>
                <thead>
                    <tr>
                        <th>Ürün</th>
                        <th>Barkod Kodu</th>
                        <th>Adet</th>
                        <th>Fiyat</th>
                        <th>Kaldır</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <button id="onaylabutonu" onclick="onayla()">Onayla</button>
<span id="onaymesaji"></span>



        </div>
    </div>

    <script>
          function onayla() {
    document.getElementById("onaymesaji").innerText = "Onaylandı"; // bu kısım siparis sayfamda onayla butonuna basınca yazının değişmesi olayı  
    document.getElementById("onaylabutonu").disabled = true; // Butonu devre dışı bırak
    setTimeout(function() {
      document.getElementById("onaymesaji").innerText = "";
      document.getElementById("onaylabutonu").disabled = false; // Butonu tekrar etkinleştir
    }, 4000); // 4 saniye sonra
  }
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.add-button').forEach(button => {
                button.addEventListener('click', function() {
                    const name = this.getAttribute('data-name');
                    const price = this.getAttribute('data-price');
                    const barkod = this.getAttribute('data-barkod');
                    document.getElementById('selectedProduct').textContent = name;
                    document.getElementById('selectedPrice').value = price;
                    document.getElementById('selectedbarkod').value = barkod;
                    document.getElementById('inputArea').value = '';
                });
            });

            document.getElementById('confirmButton').addEventListener('click', function() {
                const name = document.getElementById('selectedProduct').textContent;
                const price = Number(document.getElementById('selectedPrice').value);
                const barkod = Number(document.getElementById('selectedbarkod').value);
                const quantity = Number(document.getElementById('inputArea').value);
                const totalPrice = quantity * price;
                const table = document.querySelector('.right table tbody');
                const row = table.insertRow();
                row.insertCell(0).textContent = name;
                row.insertCell(1).textContent = barkod;
                row.insertCell(2).textContent = quantity;
                row.insertCell(3).textContent = totalPrice + ' TL';
                const removeBtn = document.createElement('button');
                removeBtn.textContent = 'Kaldır';
                removeBtn.addEventListener('click', function() {
                    this.closest('tr').remove();
                });
                row.insertCell(4).appendChild(removeBtn);
            });
        });



       document.getElementById('onaylabutonu').addEventListener('click', function() {
    const rows = document.querySelectorAll('.right table tbody tr');

    rows.forEach(row => {
        const name = row.cells[0].textContent;
        const barkod = parseInt(row.cells[1].textContent);
        const quantity = parseInt(row.cells[2].textContent);
        const price = parseFloat(row.cells[3].textContent);
        const totalPrice = quantity * price;

        /* Veritabanından eşleşen ürünü bul ve adet miktarını çıkar
         bu kısımda alta veritabanı_islem.php sayfanına gidicek ve bu verileri yollacak yani şöyle
        &fiyat varya ismi o demek yani
        fiyat diye biri var ve ismi = price yani değeri
        mesela fiyat değeri = 12
        fiyat = 12 gibi 
        veritabanı_islem.php sayfasınada böyle gönderilcek ve orada da bu isimler yakalncak

        mesela "fiyat" başka ne var "quantity" ve "barkod " var */
        fetch('veritabani_islem.php?barkod=' + barkod + '&quantity=' + quantity + '&fiyat=' + price)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Başarılı bir şekilde adet miktarı çıkarıldı, şimdi sipariş tablosuna ekleyelim
                    fetch('', {  // fetch(''...    kısmında '' varya bu işte bu sayfaya verileri yolladım demek tırnak içinde mesela aa.php olsaydı aa.php sayfasına verileri yolladım demekti oalcaktı 
                        method: 'POST', // post methodu ile yollamışdemek
                        headers: {
                            'Content-Type': 'application/json'
                        },

                          // Gönderilecek verileri JSON formatına dönüştür
                        body: JSON.stringify({
                            name: name,
                            barkod: barkod,
                            price: price,
                            quantity: quantity,
                            totalPrice: totalPrice
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Sipariş başarıyla eklendi, tablodan satırı kaldıralım
                            row.remove();
                        } else {
                            console.error('Sipariş eklenirken bir hata oluştu.');
                        }
                    })
                    .catch(error => {
                        console.error('Sipariş eklenirken bir hata oluştu:', error);
                    });
                } else {
                    console.error('Ürün stokta yetersiz.');
                }
            })
            .catch(error => {
                console.error('Ürün bilgileri alınırken bir hata oluştu:', error);
            });
    });

    
   
});





document.getElementById('fiyatbutonu').addEventListener('click', function() {
    const rows = document.querySelectorAll('.right table tbody tr');
    let barkodlar = [];
    let quantities = [];
    let prices = [];

    rows.forEach(row => {
        const barkod = parseInt(row.cells[1].textContent);
        const quantity = parseInt(row.cells[2].textContent);
        const price = parseFloat(row.cells[3].textContent);

        barkodlar.push(barkod);
        quantities.push(quantity);
        prices.push(price);
    });

    /* bu kısımda yapılan yukarıda anlattığım gibi odeme_yazdir.php sayfama değişkenleri ve verileri yolluyor mesela:
    2 tane barkod var ve yollaması gerekiyorsa böyle yollacak 
    barkodlar = 12132-342342
     */
    let url = 'odeme_yazdir.php?barkodlar=' + barkodlar.join('-') + '&quantities=' + quantities.join('-') + '&prices=' + prices.join('-');
    window.open(url, '_blank'); // Yeni bir pencerede aç
});


    </script>




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


  </body>
</html>


