<?php
if (isset($_GET['totalPrice'])) {
    $totalPrice = $_GET['totalPrice'];

    // E-posta gönderme işlemi
    $to = "emre_482_482@hotmail.com";
    $subject = "Sipariş Onayı";
    $message = "Toplam Fiyat: " . $totalPrice;
    $headers = "From: webmaster@example.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Sipariş onayı gönderildi.');</script>";
    } else {
        echo "<script>alert('E-posta gönderilemedi.');</script>";
    }
} else {
    echo "<script>alert('Hatalı istek.');</script>";
}
?>
