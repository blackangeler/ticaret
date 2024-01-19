<?php
include 'conn.php';

$message = ""; // İşlem sonucuna göre uyarı mesajı

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        $productId = $_POST["product_id"];
        $productName = $_POST["product_name"];
        $productPrice = $_POST["product_price"];
        $stockQuantity = $_POST["stock_quantity"];
        $origin = $_POST["origin"];
        $roastLevel = $_POST["roast_level"];
        $flavorNotes = $_POST["flavor_notes"];

        // Sepet tablosuna ekleme işlemi
        $insertSql = "INSERT INTO sepet (id, isim, adet, fiyat, stok_adet, koken, kavurma, icerik) VALUES (?, ?, 1, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("ississs", $productId, $productName, $productPrice, $stockQuantity, $origin, $roastLevel, $flavorNotes);

        if ($stmt->execute()) {
            $message = "Ürün sepete eklendi.";
        } else {
            $message = "Hata: Ürün sepetinizde bulunmaktadır.";
        }

        $stmt->close();
    }
}

$sql = "SELECT tablo1.*, IF(sepet.id IS NOT NULL, 1, 0) AS in_cart
        FROM tablo1
        LEFT JOIN sepet ON tablo1.product_id = sepet.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Listesi</title>
</head>
<body>
    <a href="sepet.php">Sepete Git</a>
    <br></br>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Product ID</th>
                    <th>Title</th>
                    <th>Category ID</th>
                    <th>Category Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock Quantity</th>
                    <th>Origin</th>
                    <th>Roast Level</th>
                    <th>Flavor Notes</th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["product_id"] . "</td>
                    <td>" . $row["title"] . "</td>
                    <td>" . $row["category_id"] . "</td>
                    <td>" . $row["category_title"] . "</td>
                    <td>" . $row["description"] . "</td>
                    <td>" . $row["price"] . "</td>
                    <td>" . $row["stock_quantity"] . "</td>
                    <td>" . $row["origin"] . "</td>
                    <td>" . $row["roast_level"] . "</td>
                    <td>" . $row["flavor_notes"] . "</td>
                    <td>
                        <form method='post' action=''>
                            <input type='hidden' name='product_id' value='" . $row["product_id"] . "'>
                            <input type='hidden' name='product_name' value='" . $row["title"] . "'>
                            <input type='hidden' name='product_price' value='" . $row["price"] . "'>
                            <input type='hidden' name='stock_quantity' value='" . $row["stock_quantity"] . "'>
                            <input type='hidden' name='origin' value='" . $row["origin"] . "'>
                            <input type='hidden' name='roast_level' value='" . $row["roast_level"] . "'>
                            <input type='hidden' name='flavor_notes' value='" . $row["flavor_notes"] . "'>
                            <button type='submit' name='add_to_cart'>Sepete Ekle</button>
                        </form>
                    </td>
                    <td>" . ($row["in_cart"] ? "Ürün Sepetinizde Bulunmaktadır." : "") . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Tablo1'de hiç veri yok.";
    }

    // Uyarı mesajını görüntüle
    if (!empty($message)) {
        echo "<script>alert('$message');</script>";
    }

    $conn->close();
    ?>
    <br></br>
    <a href="sepet.php">Sepete Git</a>
    <br></br>
    <a href="indexkupon2.php"> Kupon Kodu uygulaması
