  <?php
session_start();


// Kullanıcının giriş yapıp yapmadığını kontrol ettim, giriş yapmamışsa giriş sayfasına yönlendirdim
if (!isset($_SESSION["telefon"])) {
     header("Location: ../index.php");
  exit();
    
}

// Oturumdan kullanıcı bilgilerini aldım
$user = $_SESSION["telefon"];
$isim = $_SESSION['isim'];

?>

 <!DOCTYPE html>
<html>
<head>
    <title>Firma Ekle</title>
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
     <center> Firma Ekle</center> 

<br><br>
    

    <div class="container2">
    <div class="form-container">
      <form action="firmayolla.php" method="POST" enctype="multipart/form-data">
        <label  for="firma">Firma İsmi</label>
        <input type="text" name="firma"><br><br>
        <label  for="firtel">Firma İletişim</label>
        <input type="text" name="firtel"><br><br>
     
        <input type="submit" value="Gönder">
      </form>
    </div>
  
 


  </div>
</div>



<br><br><br><br> <!-- boşluk -->



    </div>
  

</body>
</html>
