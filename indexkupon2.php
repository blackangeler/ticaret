<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kupon Kodu Kontrol</title>
</head>
<body>
    <h1>Kupon Kodu Kontrol</h1>

    <form method="post">
        <label for="couponCode">Kupon Kodu:</label>
        <input type="text" id="couponCode" name="couponCode" required>
        <button type="submit">Kontrol Et</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $couponCode = strtoupper($_POST["couponCode"]); // Girilen kupon kodunu büyük harfe çevir

        // Kupon kodu formatını kontrol et
        $isValid = isValidCouponFormat($couponCode);

        // Sonucu ekrana yazdır
        echo $isValid ? "<p>Geçerli Kupon Kodu</p>" : "<p>Geçersiz Kupon Kodu</p>";
    }

    function isValidCouponFormat($couponCode) {
        // En az 3 'T' harfi yan yana, bu üç 'T' harfinden bir önce bir rakam, bir sonra bir rakam kontrolü
        if (preg_match('/\dTTT+\d/', $couponCode) || preg_match('/\w\dTTT+\d\w/', $couponCode)) {
            return true;
        }

        return false;
    }
    ?>
	
	<br></br>
	<a href="index8.php">Anasayfaya Git</a>
</body>
</html>
