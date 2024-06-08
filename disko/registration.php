<?php
// Kontrola, zda byl odeslán formulář
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kontrola kódu pro registraci
    if ($_POST['code'] !== '1746') {
        header("Location: registration_unsucc.html");
        exit();
    }

    // Připojení k databázi
    $db_host = 'kocicka.endora.cz'; // Adresa serveru databáze
    $db_name = 'nazev_databaze'; // Název databáze
    $db_user = 'novy_uzivatel'; // Nový uživatelský účet pro přístup k databázi
    $db_password = 'vase_heslo'; // Heslo pro nového uživatele    
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Kontrola připojení k databázi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Zpracování formuláře
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashování hesla pro bezpečné uložení

    // Příprava dotazu pro vložení dat do databáze
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: registration_succ.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Uzavření spojení s databází
    $conn->close();
}
?>
