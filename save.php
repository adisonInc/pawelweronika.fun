<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

$ip_address = $_SERVER['REMOTE_ADDR'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = htmlspecialchars(trim($_POST["full_name"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $companion = htmlspecialchars(trim($_POST["companion"]));
    $hotel = htmlspecialchars(trim($_POST["hotel"]));

    $stmt = $conn->prepare("INSERT INTO responses (full_name, phone, companion, hotel, ip_address) 
                            VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $full_name, $phone, $companion, $hotel, $ip_address);

    if ($stmt->execute()) {
        echo "<p>Dziękujemy za przesłanie formularza!</p>";
    } else {
        echo "<p>Błąd zapisu: " . $stmt->error . "</p>";
    }

    $stmt->close();

    echo '<script>
            setTimeout(function() {
                window.location.href = "index.html";
            }, 100); 
          </script>';
}

$conn->close();
?>
