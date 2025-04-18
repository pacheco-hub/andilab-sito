<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Connessione al database
$servername = "localhost3306";
$username = "sql_000005_2";
$password = "A43w5aa~";
$dbname = "contatti_clienti";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connessione fallita: " . $conn->connect_error);
}

// Prepara la risposta iniziale
$response = array(
    "esito"     => 0, // Default: errore
    "errori"    => array(),
    "messaggio" => "Errore nell'invio",
    "data"      => array()
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['name'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];
    $oggetto = $_POST['oggetto'];
    $messaggio = $_POST['message'];

    // Inserisci nel database
    $sql = "INSERT INTO contatti (nome, numero, email, oggetto, messaggio) 
            VALUES ('$nome', '$numero', '$email', '$oggetto', '$messaggio')";

    if (!$conn->query($sql)) {
        $response["errori"][] = "Errore durante l'inserimento nel database.";
        echo json_encode($response);
        exit;
    }

    // Configura l'email
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pacheco.andilab@gmail.com';
        $mail->Password = 'sxak txkm zcbb ihey'; // Usa una password per app se necessario
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('pacheco.andilab@gmail.com', 'Kevin');
        $mail->addAddress('pacheco.andilab@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = "Preventivo da $email";
        $mail->Body = "Nome: $nome<br>Numero: $numero<br>Email: $email<br>Oggetto: $oggetto<br>Messaggio: $messaggio";

        if ($mail->send()) {
            // Successo
            $response["esito"] = 1;
            $response["messaggio"] = "Email inviata con successo!";
        } else {
            $response["errori"][] = "Errore nell'invio dell'email.";
        }
    } catch (Exception $e) {
        $response["errori"][] = "Errore nell'invio dell'email: " . $e->getMessage();
    }

    $conn->close();
    echo json_encode($response); // Risponde con il JSON
    exit;
}
?>
