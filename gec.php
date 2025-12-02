<!DOCTYPE html>
<html>
<head>
  <title>Ana Sayfa</title>
  <style>
    body {
      overflow-x: hidden; /* Yatay kaydırmayı devre dışı bırak */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    #video-background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }
    
    .transition-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(200, 200, 200, 0.8); /* Yeşil renk */
      z-index: 9999;
      animation: transition-effect 2s ease-out forwards;
    }
    
    @keyframes transition-effect {
      0% {
        transform: translateX(-100%);
      }
      100% {
        transform: translateX(100%);
      }
    }
    
    #loading-message {
      font-size: 24px;
      color: #fff;
    }
  </style>
</head>
<body>
  <video id="video-background" autoplay muted loop>
    <source src="gorsel/gecis.mp4" type="video/mp4"> <!-- video açıyoruz sayfada -->
  </video>

  <div class="transition-container"></div>
  
  <div id="loading-message">Yükleniyor...</div>

  <script>
    // Sayfa yüklendiğinde kayit.php'ye yönlendirme yapmak için aşağıdaki JavaScript kodunu ekleyebilirsiniz.
    window.onload = function() {
      setTimeout(function() {
        window.location.href = "index.php";
      }, 2000);
    };
  </script>
</body>
</html>
