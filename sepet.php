<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Sepeti</title>
</head>
<body>
    <a href="index8.php">Anasayfaya Git</a>
    <h1>Ürün Sepeti</h1>

    <?php
    // Veritabanı bağlantısı
    include 'conn.php';

    // Adet güncelleme işlemi
    if (isset($_POST['update_quantity'])) {
        $productId = $_POST["id"];
        $newQuantity = $_POST["new_quantity"];

        // Stok miktarını kontrol et
        $checkStockSql = "SELECT stok_adet FROM sepet WHERE id = ?";
        $stmt = $conn->prepare($checkStockSql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $stmt->bind_result($stockQuantity);
        $stmt->fetch();
        $stmt->close();

        // Stoktan fazla adet girişi yapılıyorsa hata mesajı göster
        if ($newQuantity > $stockQuantity) {
            echo "<script>alert('Hata: Stok miktarından fazla adet girişi yapamazsınız.')</script>";
        } else {
            // Stoktan fazla adet girişi yapılmıyorsa adet güncelleme işlemine devam et
            $updateSql = "UPDATE sepet SET adet = ? WHERE id = ?";
            $stmt = $conn->prepare($updateSql);
            $stmt->bind_param("ii", $newQuantity, $productId);

            if ($stmt->execute()) {
                // Adet güncelleme başarılı
                echo "<script>alert('Adet miktarı güncellendi.')</script>";
            } else {
                echo "<script>alert('Hata: Adet miktarı güncellenemedi.')</script>";
            }

            $stmt->close();
        }
    }

    // Ürünü sepetten çıkarma işlemi
    if (isset($_POST['remove_product'])) {
        $productId = $_POST["id"];

        $deleteSql = "DELETE FROM sepet WHERE id = ?";
        $stmt = $conn->prepare($deleteSql);
        $stmt->bind_param("i", $productId);

        if ($stmt->execute()) {
            // Ürün sepetten çıkarılma başarılı
            echo "<script>alert('Ürün sepetten çıkarıldı.')</script>";
        } else {
            echo "<script>alert('Hata: Ürün sepetten çıkarılamadı.')</script>";
        }

        $stmt->close();
    }

    // Sepet verilerini çek
    $sql = "SELECT * FROM sepet";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>İsim</th>
                    <th>Adet</th>
                    <th>Fiyat</th>
                    <th>Köken</th>
                    <th>Kavurma</th>
                    <th>İçerik</th>
                    <th>Toplam Fiyat</th>
                    <th>Stok Adet</th>
                    <th>İşlemler</th>
                </tr>";

        $totalPrice = 0; // Toplam fiyatı tutmak için değişken

        while ($row = $result->fetch_assoc()) {
            // Toplam fiyatı hesapla
            $subtotal = $row["adet"] * $row["fiyat"];
            $totalPrice += $subtotal;

            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["isim"] . "</td>
                    <td><span id='quantity_" . $row["id"] . "'>" . $row["adet"] . "</span></td>
                    <td>" . $row["fiyat"] . "</td>
                    <td>" . $row["koken"] . "</td>
                    <td>" . $row["kavurma"] . "</td>
                    <td>" . $row["icerik"] . "</td>
                    <td>" . $subtotal . "</td>
                    <td>" . $row["stok_adet"] . "</td>
                    <td>
                        <form method='post' action=''>
                            <input type='hidden' name='id' value='" . $row["id"] . "'>
                            <input type='number' name='new_quantity' placeholder='Yeni Adet'>
                            <button type='submit' name='update_quantity'>Güncelle</button>
                            <button type='submit' name='remove_product'>Sepetten Çıkar</button>
                        </form>
                    </td>
                </tr>";
        }

        echo "</table>";

        // Toplam fiyatı göster
        echo "<p>Toplam Fiyat: " . $totalPrice . "</p>";

        // Kargo ve İndirim Hesaplamaları
        if ($totalPrice < 500) {
            $kargoFiyati = 54.99;
            $totalPrice += $kargoFiyati;
            echo "<p>Kargo Fiyatı: " . $kargoFiyati . "</p>";
            echo "<p>Kargo Dahil Toplam Fiyat: " . $totalPrice . "</p>";
        } elseif ($totalPrice >= 1000 and $totalPrice < 1500) {
            $totalPrice -= ($totalPrice * 10 / 100);
            $kargoFiyati = "Kargo Bedava";
            echo "<p>Kargo Fiyatı: " . $kargoFiyati . "</p>";
            echo "<p>Tebrikler, sepetiniz 1000TL'yi geçtiği için %10 indirim kazandınız. İndirimli Toplam Fiyat: " . $totalPrice . "</p>";
        } elseif ($totalPrice >= 1500 and $totalPrice < 2000) {
            $totalPrice -= ($totalPrice * 15 / 100);
            $kargoFiyati = "Kargo Bedava";
            echo "<p>Kargo Fiyatı: " . $kargoFiyati . "</p>";
            echo "<p>Tebrikler, sepetiniz 1500TL'yi geçtiği için %15 indirim kazandınız. İndirimli Toplam Fiyat: " . $totalPrice . "</p>";
        } elseif ($totalPrice >= 2000 and $totalPrice < 3000) {
            $totalPrice -= ($totalPrice * 20 / 100);
            $kargoFiyati = "Kargo Bedava";
            echo "<p>Kargo Fiyatı: " . $kargoFiyati . "</p>";
            echo "<p>Tebrikler, sepetiniz 2000TL'yi geçtiği için %20 indirim kazandınız. İndirimli Toplam Fiyat: " . $totalPrice . "</p>";
        } elseif ($totalPrice >= 3000) {
            $totalPrice -= ($totalPrice * 25 / 100);
            $kargoFiyati = "Kargo Bedava";
            echo "<p>Kargo Fiyatı: " . $kargoFiyati . "</p>";
            echo "<p>Tebrikler, sepetiniz 3000TL'yi geçtiği için %25 indirim kazandınız. İndirimli Toplam Fiyat: " . $totalPrice . "</p>";
            echo "<p>Tebrikler, 1 kg kahve kazandınız.</p>";
        } else {
            $kargoFiyati = "Kargo Bedava";
            echo "<p>Kargo Fiyatı: " . $kargoFiyati . "</p>";
        }

        // Siparişi Onayla Butonu
        echo "<form method='post' action=''>
                <button type='submit' name='confirm_order'>Siparişi Onayla</button>
            </form>";

        // Siparişi Onayla Butonuna Tıklanınca
        if (isset($_POST['confirm_order'])) {
            echo "<script>
                    var confirmOrder = confirm('Bu tutardaki alışverişi yapmak istediğinize emin misiniz?');
                    if (confirmOrder) {
                        window.location.href = 'send_email.php?totalPrice=" . $totalPrice . "';
                    } else {
                        alert('İşlem iptal edildi.');
                    }
                  </script>";
        }
    } else {
        echo "Sepet tablosunda hiç veri yok.";
    }

    $conn->close();
    ?>
</body>
</html>
