<?php
// Mostra eventuali errori (per debug)
// (Ricorda di disattivare display_errors in produzione)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica che il campo email non sia vuoto
    if (empty($_POST['EMAIL'])) {
        echo json_encode([
            "status" => "error",
            "message" => "Inserire un'email"
        ]);
        exit;
    }
    
    // Verifica che l'email sia valida
    if (!filter_var($_POST['EMAIL'], FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            "status" => "error",
            "message" => "Email non valida"
        ]);
        exit;
    }

    
    $recaptchaSecret = '6Ld7cyArAAAAAFerqWTUWTxtE53yzD-Gsx1mHddD';
    $recaptchaResponse = $_POST['recaptcha-response'];

    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecret}&response={$recaptchaResponse}");
    $responseKeys = json_decode($verify, true);

    if (!$responseKeys["success"] || $responseKeys["score"] < 0.5) {
        echo json_encode([
            "status" => "error",
            "message" => "Verifica reCAPTCHA fallita"
        ]);
        exit;
    }
    $email = $_POST['EMAIL'];
    $data_iscrizioni = date("Y-m-d H:i:s");

  
    
    // Crea la connessione
    $conn = new mysqli('localhost:3306', 'sql_andilab_it', '3mxrqkYp3mK0t^Nu7', 'sql_000005_2');
    
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
}
?>
