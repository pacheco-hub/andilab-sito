<?php
// Mostra eventuali errori (per debug)
// (Ricorda di disattivare display_errors in produzione)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica che l'email sia presente e valida
    if (isset($_POST['EMAIL']) && filter_var($_POST['EMAIL'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['EMAIL'];
        $data_iscrizioni = date("Y-m-d H:i:s");

        // Configurazione del database (per XAMPP)
        $servername = "localhost";
        $username = "root";      // Default di XAMPP
        $password = "";          // Default di XAMPP
        $dbname = "email";       // Nome del tuo database

        // Crea la connessione
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            echo json_encode([
                "status" => "error",
                "message" => "Connessione al database fallita: " . $conn->connect_error
            ]);
            exit;
        }

        // Prepara la query per inserire l'email nella tabella "utenti"
        $stmt = $conn->prepare("INSERT INTO utenti (email, data_iscrizioni) VALUES (?, ?)");
        if (!$stmt) {
            echo json_encode([
                "status" => "error",
                "message" => "Errore nella preparazione della query: " . $conn->error
            ]);
            exit;
        }
        
        $stmt->bind_param("ss", $email, $data_iscrizioni);

        // Esegue la query
        if ($stmt->execute()){
            echo json_encode([
                "status" => "success",
                "message" => "Iscrizione avvenuta"
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Errore durante l'iscrizione: " . $stmt->error
            ]);
        }

        $stmt->close();
        $conn->close();
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Email non valida"
        ]);
    }
}
?>
