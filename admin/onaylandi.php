       
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Yükleniyor...</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    #loading {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    #loading img {
      width: 120px;
    }

    #loading p {
      font-size: 20px;
      margin-top: 20px;
      color: #666;
    }
  </style>
</head>
<body>

<div id="loading">
  <img  src="https://media.tenor.com/TgKK6YKNkm0AAAAi/verified-verificado.giff" alt="Loading..."> <!-- ekranda gif gösteriyorum -->
  <p>Başarıyla Gerçekleşti.</p>
</div>

<script>
  // Sayfa yüklendiğinde çalışacak kod
  window.onload = function() {
    // 3 saniyelik gecikme sonrasında yönlendirme yap
    setTimeout(function() {
      window.location.href = 'index.php';
    }, 2000); // gif 2000 yani 2 saniye gözükcek sonra index.php gidicek
  };
</script>

</body>
</html>











