<?php
// Připojení k databázi
$db_host = 'localhost'; // Adresa serveru databáze
$db_name = 'rocnikovkadis'; // Název databáze
$db_user = 'root'; // Uživatelské jméno pro přístup k databázi
$db_password = ''; // Heslo pro přístup k databázi
$db_adminID = '1746';
// Připojení k databázi
$conn = new mysqli($db_host, $db_user, $db_password, $db_name, $db_adminID);

// Kontrola připojení
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Zpracování formuláře
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Získání hodnot z formuláře
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashování hesla pro bezpečné uložení
    $adminID = $_POST['adminID']; // Přidání adminID z formuláře

    // Kontrola, zda adminID odpovídá očekávané hodnotě
    if ($adminID == $db_adminID) {
        // Příprava dotazu pro vložení dat do databáze
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid adminID"; // Pokud adminID není správné, zobrazí se chybová zpráva
    }
}

// Uzavření spojení s databází
$conn->close();
?>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Login - CGCPriceTracker</title>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div id="navcol-1" class="collapse navbar-collapse">
                <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
                    <div class="container"><a class="navbar-brand logo" href="#">CGCPriceTracker</a><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div id="navcol-2" class="collapse navbar-collapse">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item item"><a class="nav-link" href="index.html">Domů</a></li>
                                <li class="nav-item item"><a class="nav-link" href="catalog-page.html">pRODUKTY</a></li>
                                <li class="nav-item item"><a class="nav-link active" href="login.html">pŘIHLAŠTE SE</a></li>
                                <li class="nav-item item"></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">domů</a></li>
                    <li class="nav-item"><a class="nav-link" href="catalog-page.html">Produkty</a></li>
                    <li class="nav-item"><a class="nav-link active" href="login.html">Přihláste se</a></li>
                    <li class="nav-item"><a class="nav-link" href="registration.html">Zaregistrujte se</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Přihlášení</h2>
                    <p></p>
                </div>
                <form>
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input id="email" class="form-control item" type="email" /></div>
                    <div class="mb-3"><label class="form-label" for="password">Heslo</label><input id="password" class="form-control" type="password" /></div><a href="registration.html">Registrujte se</a>
                    <div class="mb-3"></div><button class="btn btn-primary" type="submit">Přihlásit se</button>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Domů</a></li>
                        <li><a href="#">Přihlásit se</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2024 Copyright Text</p>
        </div>
    </footer>
</body>

</html>