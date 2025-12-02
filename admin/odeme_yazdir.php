
<html>

<head>
	<meta charset="utf-8">
	<title>Ödeme Yazdır</title>
	<link rel="stylesheet" href="style.css">
	
	<script src="script.js"></script>
	<style>
		

		* {
			border: 0;
			box-sizing: content-box;
			color: inherit;
			font-family: inherit;
			font-size: inherit;
			font-style: inherit;
			font-weight: inherit;
			line-height: inherit;
			list-style: none;
			margin: 0;
			padding: 0;
			text-decoration: none;
			vertical-align: top;
		}

		/* content editable */

		*[contenteditable] {
			border-radius: 0.25em;
			min-width: 1em;
			outline: 0;
		}

		*[contenteditable] {
			cursor: pointer;
		}

		*[contenteditable]:hover,
		*[contenteditable]:focus,
		td:hover *[contenteditable],
		td:focus *[contenteditable],
		img.hover {
			background: #DEF;
			box-shadow: 0 0 1em 0.5em #DEF;
		}

		span[contenteditable] {
			display: inline-block;
		}

		/* heading */

		h1 {
			font: bold 100% sans-serif;
			letter-spacing: 0.5em;
			text-align: center;
			text-transform: uppercase;
		}

		/* table */

		table {
			font-size: 75%;
			table-layout: fixed;
			width: 100%;
		}

		table {
			border-collapse: separate;
			border-spacing: 2px;
		}

		th,
		td {
			border-width: 1px;
			padding: 0.5em;
			position: relative;
			text-align: left;
		}

		th,
		td {
			border-radius: 0.25em;
			border-style: solid;
		}

		th {
			background: #EEE;
			border-color: #BBB;
		}

		td {
			border-color: #DDD;
		}

		/* page */

		html {
			font: 16px/1 'Open Sans', sans-serif;
			overflow: auto;
			padding: 0.5in;
		}

		html {
			background: #999;
			cursor: default;
		}

		body {
			box-sizing: border-box;
			height: 11in;
			margin: 0 auto;
			overflow: hidden;
			padding: 0.5in;
			width: 8.5in;
		}

		body {
			background: #FFF;
			border-radius: 1px;
			box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
		}

		/* header */

		header {
			margin: 0 0 3em;
		}

		header:after {
			clear: both;
			content: "";
			display: table;
		}

		header h1 {
			background: #000;
			border-radius: 0.25em;
			color: #FFF;
			margin: 0 0 1em;
			padding: 0.5em 0;
		}

		header address {
			float: left;
			font-size: 75%;
			font-style: normal;
			line-height: 1.25;
			margin: 0 1em 1em 0;
		}

		header address p {
			margin: 0 0 0.25em;
		}

		header span,
		header img {
			display: block;
			float: right;
		}

		header span {
			margin: 0 0 1em 1em;
			max-height: 25%;
			max-width: 60%;
			position: relative;
		}

		header img {
			max-height: 100%;
			max-width: 100%;
		}

		header input {
			cursor: pointer;
		
			height: 100%;
			left: 0;
			opacity: 0;
			position: absolute;
			top: 0;
			width: 100%;
		}

		/* article */

		article,
		article address,
		table.meta,
		table.inventory {
			margin: 0 0 3em;
		}

		article:after {
			clear: both;
			content: "";
			display: table;
		}

		article h1 {
			clip: rect(0 0 0 0);
			position: absolute;
		}

		article address {
			float: left;
			font-size: 125%;
			font-weight: bold;
		}

		/* table meta & balance */

		table.meta,
		table.balance {
			float: right;
			width: 36%;
		}

		table.meta:after,
		table.balance:after {
			clear: both;
			content: "";
			display: table;
		}

		/* table meta */

		table.meta th {
			width: 40%;
		}

		table.meta td {
			width: 60%;
		}

		/* table items */

		table.inventory {
			clear: both;
			width: 100%;
		}

		table.inventory th {
			font-weight: bold;
			text-align: center;
		}

		table.inventory td:nth-child(1) {
			width: 26%;
		}

		table.inventory td:nth-child(2) {
			width: 38%;
		}

		table.inventory td:nth-child(3) {
			text-align: right;
			width: 12%;
		}

		table.inventory td:nth-child(4) {
			text-align: right;
			width: 12%;
		}

		table.inventory td:nth-child(5) {
			text-align: right;
			width: 12%;
		}

		/* table balance */

		table.balance th,
		table.balance td {
			width: 50%;
		}

		table.balance td {
			text-align: right;
		}

		/* aside */

		aside h1 {
			border: none;
			border-width: 0 0 1px;
			margin: 0 0 1em;
		}

		aside h1 {
			border-color: #999;
			border-bottom-style: solid;
		}

		/* javascript */

		.add,
		.cut {
			border-width: 1px;
			display: block;
			font-size: .8rem;
			padding: 0.25em 0.5em;
			float: left;
			text-align: center;
			width: 0.6em;
		}

		.add,
		.cut {
			background: #9AF;
			box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
			background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
			background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
			border-radius: 0.5em;
			border-color: #0076A3;
			color: #FFF;
			cursor: pointer;
			font-weight: bold;
			text-shadow: 0 -1px 2px rgba(0, 0, 0, 0.333);
		}

		.add {
			margin: -2.5em 0 0;
		}

		.add:hover {
			background: #00ADEE;
		}

		.cut {
			opacity: 0;
			position: absolute;
			top: 0;
			left: -1.5em;
		}

		.cut {
			-webkit-transition: opacity 100ms ease-in;
		}

		tr:hover .cut {
			opacity: 1;
		}

		@media print {
			* {
				-webkit-print-color-adjust: exact;
			}

			html {
				background: none;
				padding: 0;
			}

			body {
				box-shadow: none;
				margin: 0;
			}

			span:empty {
				display: none;
			}

			.add,
			.cut {
				display: none;
			}
		}

		@page {
			margin: 0;
		}
	</style>

</head>

<?php
/* Çıktı tamponlamayı başlatıyoruz 
yani ne demek bu özetle 
Örneğin, bir web sayfasında PHP kodu ile HTML içeriği oluşturuyorsunuz ve bu HTML içeriği dinamik olarak oluşturuluyor. ob_start() fonksiyonunu kullanarak çıktıyı tampona alırsanız, PHP kodunun çalışması tamamlandıktan sonra çıktı ekrana gönderilmeden önce bir tampona alınır. Bu, sayfanın herhangi bir yerinde hata oluşursa veya yönlendirmeler gibi işlemler gerçekleşirse, çıktının yanlış yerlerde gönderilmesini önler ve daha düzenli bir kod yazmanıza olanak sağlar.
*/
ob_start();

// Bağlantı dosyasını dahil et
include "../baglanti.php";

// GET isteğiyle gelen barkod, miktar ve fiyat bilgilerini al
// Barkodları '-' karakterine göre ayır ve diziye dönüştür
$barkodlar = explode('-', $_GET['barkodlar']);

// Miktarları '-' karakterine göre ayır ve diziye dönüştür
$quantities = explode('-', $_GET['quantities']);

// Fiyatları '-' karakterine göre ayır ve diziye dönüştür
$prices = explode('-', $_GET['prices']);

/* siparisler.php ve veritabanı_islem.php sayfasını inceledisen orada bunu anlattım

1213-32432 şeklinde gçnderdiğimizi bu sayede birden fazla gönderdik ve nu sayfada gelenverileri 

"-" bunu referas alarak ayıkladık yani bir bütün oalrak yoklladık o sayfadan 1223-312432-34324 gibi 
burada ise şöyle çıktı aldık:

barkod1 = 1223
barkod2 = 312432
...

*/ 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatura</title>
    <style>
        /* CSS still need to be included */
    </style>
</head>
<body>
    <header>
        <h1>Fatura</h1>
        <address>
            <p>Bakkal Hesabı,</p>
            <p>(+90) 555555555</p>
        </address>
    </header>
    <article>
        <h1>Alıcı</h1>
        <address>
            <p>Ürünler<br></p>
        </address>
        <table class="meta">
            <tr>
                <th><span>Fatura #</span></th>
                <td><span><?php echo "Bakkal Sistemi"; ?></span></td>
            </tr>
            <tr>
                <th><span>Tarih</span></th>
                <?php
// Bugünün tarihini al
$bugunun_tarihi = date("Y-m-d");

?>
                <td><span><?php echo $bugunun_tarihi; ?> </span></td>
            </tr>

        </table>
        <table class="inventory">
            <thead>
                <tr>
                    <th><span>Ürün</span></th>
                    <th><span>Barkodu</span></th>
                    <th><span>Birim Fiyat</span></th>
                    <th><span>Miktar</span></th>
                    <th><span>Fiyat</span></th>
                </tr>
            </thead>
            <tbody>



<?php 
// barkodlar dizisindeki her bir barkod için sorgu yap
foreach ($barkodlar as $key => $barkod) {
    // Her bir barkod için bir SQL sorgusu oluştur
    $query = "SELECT urun_ismi FROM urunver WHERE barkod_kodu = '$barkod'";
    
    // Veritabanı bağlantısı kullanarak sorguyu çalıştır ve sonucu al
    $result = mysqli_query($conn, $query);

    // Eğer sorgu sonucunda eşleşen bir kayıt varsa
    if (mysqli_num_rows($result) > 0) {
        // İlk eşleşen kaydı al
        $row = mysqli_fetch_assoc($result);

        // Sonuçları ekrana bastırabilirsiniz
   
 ?>

        <tr>
            <td><span><?php echo $row['urun_ismi']; ?></span></td>
            <td><span><?php echo $barkod; ?></span></td>
            <td><span><?php $sonuc = $prices[$key] / $quantities[$key]; echo $sonuc; ?></span><span data-prefix>TL</span></td>
            <td><span><?php echo $quantities[$key]; ?></span></td>
            <td><span><?php echo $prices[$key]; ?></span><span data-prefix>TL</span></td>
        </tr>
<?php 
    } else {
        echo "Barkod '$barkod' için ürün bulunamadı.<br>";
    }
}
?>

            </tbody>
        </table>

        <table class="balance">
            <tr>
                <th><span>Toplam</span></th>
                <td><span><?php echo array_sum($prices); ?></span><span data-prefix>TL</span></td>
            </tr>
            <tr>
                <th><span>Ödenen Miktar</span></th>
                <td><span><?php echo array_sum($prices); ?></span><span data-prefix>TL</span></td>
            </tr>
            <tr>
                <th><span>Kalan Tutar</span></th>
                <td><span><?php echo 00; ?></span><span data-prefix>TL</span></td>
            </tr>
        </table>

    </article>
    <aside>
        <h1><span>Bizimle iletişime geç</span></h1>
        <div>
            <p align="center">Email :- bakkal@gmail.com || Web :- www.bakkal.com || Tel :- +90 5555555555 </p>
        </div>
    </aside>

</body>
</html>






<?php

ob_end_flush();
/* ob_end_flush() işlevi, çıktı tamponlamasını sonlandırır ve tampona alınmış olan çıktıyı ekrana gönderi  yani ilk en üste açıkladığım */

?>




<!-- kaydetmek için pdf olarak -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.2/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.0/html2pdf.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>


    <!-- CSS Stili -->
    <style type="text/css">
        .tatil {
            background-color: rgba(0, 255, 0, 0.3); /* Yeşilimsi renk tonu ve hafif transparan */
        }


        h1 {
            font-weight: 800;
            margin: 1rem 0 0;
        }

        ul {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
            flex-wrap: wrap;
            list-style: none;
        }

        li {
            display: flex;
            width: 10rem;
            height: 10rem;
            margin: 0.25rem;
            flex-flow: column;
            border-radius: 0.2rem;
            padding: 1rem;
            font-weight: 300;
            font-size: 0.8rem;
            box-sizing: border-box;
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        time {
            font-size: 2rem;
            margin: 0 0 1rem 0;
            font-weight: 500;
        }

        .today {
            time {
                font-weight: 800;
            }
            background: #ffffff70;
        }

        .buton-container {
            display: flex;
        }

        .buton {
            background-color: #007aff; /* Renk iPhone tasarımından esinlenerek seçildi */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;

        }

        .buton:hover {
            background-color: #0056b3; /* Hover rengi */
        }

        .buton-container {
            position: fixed;
            bottom: 0;
            left: 0;
            margin: 20px;
        }
        .buton {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

<div class="buton-container">
    <button class="buton"  id="pdfIndirBtn">Fişi Kaydet</button>
</div>

<!-- HTML2PDF kütüphanesi -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.2/html2pdf.bundle.min.js"></script>

<script type="text/javascript">



document.getElementById("pdfIndirBtn").addEventListener("click", function() {
    // Butonu gizle
    document.getElementById("pdfIndirBtn").style.display = "none";

    // Sayfa URL'sini al
    var url = window.location.href;
    
    fetch(url)
        .then(response => response.text())
        .then(html => {
            // Yeni bir div oluştur
            var div = document.createElement("div");
            // HTML içeriğini div içine yerleştir
            div.innerHTML = html;
            // Butonu kaldır
            div.querySelector("#pdfIndirBtn").remove();
            // HTML içeriğini PDF olarak dönüştür ve indir
            html2pdf().from(div).set({ margin: [10, 10] }).save("Hesap_fisi.pdf"); // Kenarlardan 1cm (10mm) boşluk bırakır 10, 10 mantığı
            
            // Butonu tekrar göster
            document.getElementById("pdfIndirBtn").style.display = "block";
        })
        .catch(error => console.log(error));
});




</script>


