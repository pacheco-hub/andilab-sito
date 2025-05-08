<?php
session_start();

// Connessione al database
$servername = "localhost";
$username = "root"; // Modifica con il tuo nome utente del database
$password = ""; // Modifica con la tua password del database
$dbname = "gestione_clienti"; // Il nome del tuo database

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Controlla se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Prendi i dati dal form
    $ragione_sociale = $_POST['ragioneSociale'] ?? '';
    $partita_iva = $_POST['partitaIva'] ?? '';
    $codice_sdi = $_POST['codiceSdi'] ?? '';
    $nome_responsabile = $_POST['nome'] ?? '';
    $cognome_responsabile = $_POST['cognome'] ?? '';
    $codice_fiscale = $_POST['codiceFiscale'] ?? '';
    $indirizzo_responsabile = $_POST['indirizzo'] ?? '';
    $stato_responsabile = $_POST['stato'] ?? '';
    $comune_nascita = $_POST['comuneNascita'] ?? NULL; // Può essere NULL se non selezionato
    $telefono_responsabile = $_POST['telefono'] ?? '';
    $email_responsabile = $_POST['email'] ?? '';
    $pec = $_POST['pec'] ?? ''; 
    $sito_internet = $_POST['sitoInternet'] ?? '';
    $nome_negozio = $_POST['nomeNegozio'] ?? '';
    $telefono_negozio = $_POST['telefonoNegozio'] ?? '';
    $email_negozio = $_POST['emailNegozio'] ?? '';
    $indirizzo_negozio = $_POST['indirizzoNegozio'] ?? '';
    $citta_negozio = $_POST['cittaNegozio'] ?? '';
    $comune_negozio = $_POST['comuneNegozio'] ?? NULL; // Può essere NULL se non selezionato

    // Prepara la query SQL per inserire i dati nel database
    $sql = "INSERT INTO clienti (ragione_sociale, partita_iva, codice_sdi, nome_responsabile, cognome_responsabile, codice_fiscale, indirizzo_responsabile, stato_responsabile, comune_nascita, telefono_responsabile, email_responsabile, pec, sito_internet, nome_negozio, telefono_negozio, email_negozio, indirizzo_negozio, citta_negozio, comune_negozio) 
            VALUES ('$ragione_sociale', '$partita_iva', '$codice_sdi', '$nome_responsabile', '$cognome_responsabile', '$codice_fiscale', '$indirizzo_responsabile', '$stato_responsabile', '$comune_nascita', '$telefono_responsabile', '$email_responsabile', '$pec', '$sito_internet', '$nome_negozio', '$telefono_negozio', '$email_negozio', '$indirizzo_negozio', '$citta_negozio', '$comune_negozio')";

    if ($conn->query($sql) === TRUE) {
        // Imposta il messaggio di successo nella sessione
        $_SESSION['successMessage'] = "Dati inviati correttamente!";
    } else {
        // Imposta il messaggio di errore nella sessione
        $_SESSION['errorMessage'] = "Errore: " . $conn->error;
    }

    // Chiudi la connessione
    $conn->close();

    header("Location: ordinazione.php");
    exit;
}
?>
