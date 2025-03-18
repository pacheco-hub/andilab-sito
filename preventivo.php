<?php
// Connessione al database
$servername = "localhost"; // Cambia con il tuo server
$username = "root"; // Cambia con il tuo username
$password = ""; // Cambia con la tua password
$dbname = "contatti_clienti"; // Il nome del tuo database

// Crea connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
  die("Connessione fallita: " . $conn->connect_error);
}

// Variabili per il messaggio di successo o errore
$messaggio_successo = "";
$errore = "";

// Verifica se il modulo è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati inviati dal modulo
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $oggetto = $_POST['oggetto'];
    $messaggio = $_POST['message'];

    // Prepara la query di inserimento
    $sql = "INSERT INTO contatti (nome, email, oggetto, messaggio) 
            VALUES ('$nome', '$email', '$oggetto', '$messaggio')";

    if ($conn->query($sql) === TRUE) {
        // Successo nell'inserimento dei dati
        $messaggio_successo = "Messaggio inviato con successo!";
    } else {
        // Errore nell'inserimento dei dati
        $errore = "Errore: " . $sql . "<br>" . $conn->error;
    }

    // Chiudi la connessione
    $conn->close();

    // Dopo l'invio, resettare il form
    $_POST = array();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

<!-- meta tags -->
<meta charset="utf-8">
<meta name="keywords" content="bootstrap 5, premium, multipurpose, sass, scss, saas, software, startup, technology" />
<meta name="description" content="HTML5 Template" />
<meta name="author" content="www.themeht.com" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Title -->
<title>Andilab s.r.l</title>

<!-- favicon icon -->
<link rel="shortcut icon" href="images/pittogramma_classico.png" />

<!-- inject css start -->

<!--== bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!--== bootstrap-icons -->
<link href="css/bootstrap-icons.css" rel="stylesheet" type="text/css" />

<!--== animate -->
<link href="css/animate.css" rel="stylesheet" type="text/css" />

<!--== magnific-popup -->
<link href="css/magnific-popup.css" rel="stylesheet" type="text/css" />

<!--== owl-carousel -->
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" />

<!--== odometer -->
<link href="css/odometer.css" rel="stylesheet" type="text/css" />

<!--== spacing -->
<link href="css/spacing.css" rel="stylesheet" type="text/css" />

<!--== base -->
<link href="css/base2.css?v=3" rel="stylesheet" type="text/css" />


<!--== shortcodes -->
<link href="css/shortcodes.css" rel="stylesheet" type="text/css" />

<!--== default-theme -->
<link href="css/style2.css" rel="stylesheet" type="text/css" />

<!--== responsive -->
<link href="css/responsive.css" rel="stylesheet" type="text/css" />

<!--== modifiche -->
<link href="css/modifiche.css?v=2" data-style="styles" rel="stylesheet">

<!--== modifiche presonalizzate-->
<link href="css/chi-siamo.css" data-style="styles" rel="stylesheet">

<!--== modifiche presonalizzate-->
<link href="css/servizi.css" data-style="styles" rel="stylesheet">
<link href="css/istruzione.css?v=5" data-style="styles" rel="stylesheet">


<!-- inject css end -->
 <!--capthca 3  -->

<script src="https://www.google.com/recaptcha/api.js?render=6Lf0HfMqAAAAANou-wuqhN_X4NJpQfH7BtaoWnIf"></script>
<style>
        .successo { color: green; font-weight: bold; }
        .errore { color: red; font-weight: bold; }
    </style>
</head>

<body>

<!-- page wrapper start -->

<div class="page-wrapper">

<!-- preloader start -->

<div id="ht-preloader">
  <div class="loader clear-loader">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <div class="loader-text">Loading</div>
  </div>
</div>

<!-- preloader end -->


<!--header start-->

<header id="site-header" class="header">
  <div id="header-wrap">
    <div class="container">
      <div class="row">
        <div class="col">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg">
            <img class="logo-nav" src="images/logo.png" alt="logo"> 
            <a class="navbar-brand logo" href="#">
              <!--<span>andi</span><span id="titolo-lab">lab</span>-->
            </a>
            <button class="navbar-toggler ht-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <svg width="100" height="100" viewBox="0 0 100 100">
                <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058"></path>
                <path class="line line2" d="M 20,50 H 80"></path>
                <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942"></path>
              </svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <!-- Left nav -->
              <ul class="nav navbar-nav mx-auto">
                <!-- Home -->
                <li class="nav-item dropdown">
                  <a class="nav-link" href="index.html" target="_blank">Home</a>
                  <!--<ul class="dropdown-menu">
                    <li>
                      <a href="index.html">Home 01</a>
                    </li>
                    <li>
                      <a href="index.html">Home 02</a>
                    </li>
                    <li>
                      <a href="index-3.html">Home 03</a>
                    </li>
                    <li>
                      <a href="index-4.html">Home 04</a>
                    </li>
                    <li>
                      <a href="index-5.html">Home 05</a>
                    </li>
                  </ul>-->
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle " href="#" data-bs-toggle="dropdown">Azienda</a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="about-us.html" target="_blank">Chi Siamo</a>
                    </li>
                    <li>
                      <a href="tecnologia.html" target="_blank">Tecnologia</a>
                    </li>
                    <li>
                      <a href="certificazioni.html" target="_blank">Certificazioni</a>
                    </li>
                    <!--
                    <li class="dropdown dropdown-submenu">
                      <a class="dropdown-toggle" href="#">Portfolio</a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="portfolio-one.html">Portfolio One</a>
                        </li>
                        <li>
                          <a href="portfolio-single.html">Portfolio Single</a>
                        </li>
                      </ul>-->
                      <li>
                        <a  class="nav-link" href="politica-aziendale.html" target="_blank">Politica Aziendale</a>
                      </li>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle " href="#" data-bs-toggle="dropdown">Progetti</a>
                  <ul class="dropdown-menu">
                    <li>
                      <a  href="servizi.html">Servizi</a>
                    </li>
                    <li>
                      <a  href="piattaforma-istruzione.html" target="_blank">Piattaforma Istruzione</a>
                    </li>
                    <li>
                      <a href="istruzione-salute.html" target="_blank">Istruzione Salute</a>
                    </li>
                    <li>
                      <a  href="gestione-clienti.html" target="_blank">Gestione Clienti</a>
                    </li>
                    
                    
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link " href="#" data-bs-toggle="dropdown">Contatti</a>
                </li> 
              </ul>
            </div>
            <a class="themeht-btn dark-btn" href="preventivo.php" target="_blank">Richiedi Preventivo</a>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>

<!--header end-->


<!--page title start-->

<section class="page-title">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-lg-8 col-md-12">
        <h1>
            Preventivo
        </h1>
        <nav aria-label="breadcrumb" class="page-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html" target="_blank">
                <i class="bi bi-house-door me-1 "></i>Home</a>
            </li>
            
            <li class="breadcrumb-item active" aria-current="page">Preventivo</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="wave-shape">
    <svg width="100%" height="150px" fill="none">
      <path fill="#f8fafc">
        <animate repeatCount="indefinite" fill="freeze" attributeName="d" dur="10s" values="
          M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z;
          M0 86.3149C316 86.315 444 159.155 884 51.1554C1324 -56.8446 1320.29 34.1214 1538 70.4063C1814 116.407 2156 188.408 2560 86.315V232.317L0 232.316V86.3149Z;
          M0 53.6584C158 11.0001 213 0 363 0C513 0 855.555 115.001 1154 115.001C1440 115.001 1626 -38.0004 2560 53.6585V199.66L0 199.66V53.6584Z;
          M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z"></animate>
      </path>
    </svg>
  </div>
</section>

<!--page title end-->


<!--body content start-->

<div class="page-content">

<!--service start-->

<!--contact start-->

<section>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-12 pe-lg-10">
        <div class="map iframe-h-2">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2944.7058433334905!2d13.979212091000473!3d42.433995796891864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1331b721d5c770dd%3A0x99dc39c7a3757ac!2sVia%20dei%20Normanni%2C%2017%2C%2065014%20Loreto%20Aprutino%20PE!5e0!3m2!1sit!2sit!4v1742293498172!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 mt-7 mt-lg-0">
        <div class="theme-title">
          <h6>Offerta personalizzata</h6>
          <h2>Raccontaci la tua idea qua sotto!</h2>
        </div>

        <?php if (!empty($messaggio_successo)) { ?>
            <p class="successo"><?php echo $messaggio_successo; ?></p>
        <?php } elseif (!empty($errore)) { ?>
            <p class="errore"><?php echo $errore; ?></p>
        <?php } ?>

        <form id="contatti-form" method="post" action="">
          <div class="messages"></div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input id="form_name" type="text" name="name" class="form-control" placeholder="Nome" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input id="form_oggetto" type="text" name="oggetto" class="form-control" placeholder="Oggetto" value="<?php echo isset($_POST['oggetto']) ? $_POST['oggetto'] : ''; ?>" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <textarea id="form_message" name="message" class="form-control" placeholder="Messaggio" rows="4" required><?php echo isset($_POST['message']) ? $_POST['message'] : ''; ?></textarea>
              </div>
            </div>
            <div class="col-md-12 mt-2">
            
              <button class="themeht-btn dark-btn" style="width: 100%;">Invia!</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>




<!--service end-->


<!--counter start-->



<!--counter end-->


<!--price table start-->



<!--price table end-->

</div>

<!--body content end--> 

<!--marquee start-->

<section class="overflow-hidden p-0"  style="margin-bottom: 20px;">
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col">
        <div class="marquee-wrap">
          <div class="marquee-text">
            <span>Semplifica la gestione della tua attività</span>
            <i class="bi bi-dot"></i>
            <span>Offriamo soluzioni innovative per le tue esigenze</span>
            <i class="bi bi-dot"></i>
            <span>Un team di esperti al tuo servizio</span>
            <i class="bi bi-dot"></i>
            <span>Software personalizzabili per ogni attività</span>
            <i class="bi bi-dot"></i>
            <span>Affidabilità e professionalità garantite</span>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--marquee end-->


<!--footer start-->

<footer class="footer"  data-bg-img="images/bg/05.jpg" id="contatti" >
  <div class="container">
    <div class="primary-footer">
      <div class="row">
        <div class="col-lg-5 col-md-12">
          <h5>DOVE SIAMO</h5>
          <ul class="media-icon list-unstyled mb-8">
            <li>
              <a href="https://www.google.it/maps/place/Via+dei+Normanni,+17,+65014+Loreto+Aprutino+PE" target="_blank">
                <i class="bi bi-pin-map"></i> Via dei Normanni 17, Pescara
              </a>
            </li>
            <li>
              <a href="mailto:info@andilab.it">
                <i class="bi bi-envelope"></i> info@andilab.it
              </a>
            </li>
            <li>
              <a href="mailto:andilab@pec.it">
                <i class="bi bi-envelope-check"></i> andilab@pec.it
              </a>
            </li>
            <li>
              <a href="tel:+390858293115">
                <i class="bi bi-telephone"></i> +39-085-8293115
              </a>
            </li>
          </ul>
          <h5>PROGETTI</h5>
          <ul class="list-inline ps-0 ms-0 footer-social">
            <li class="list-inline-item">
              <a href="https://andilab.it/progetto-autoscuole-friuli.php" target="_blank">
                  <img class="piattaforme" src="images/gestioneclienti-logo.png" alt="">
                  <div class="text"><p>Gestione Clienti</p></div>
              </a>
            </li>
          
            <li class="list-inline-item">
              <a href="https://andilab.it/progetto-istruzione-salute.php" target="_blank">
                <img class="piattaforme" src="images/piattaforma_is.png" alt="">
                <div class="textto"><p>Istruzione Salute</p></div>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://andilab.it/progetto-piattaforma-istruzione.php" target="_blank">
                <img class="piattaforme" src="images/piattaforma_pi.png" alt="">
                <div class="textto"><p>Piattaforma Istruzione</p></div>
              </a>
            </li>
            
            
          </ul>
          <!--<h5>SEGUICI</h5>
          <ul class="list-inline ps-0 ms-0 footer-social">
            <li class="list-inline-item">
              <a href="#">
                <i class="bi bi-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="bi bi-dribbble"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="bi bi-instagram"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="bi bi-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="bi bi-linkedin"></i>
              </a>
            </li>
          </ul>-->
        </div>
        <div class="col-lg-7 col-md-12 mt-6 mt-lg-0">
          <h5>INFORMAZIONI</h5>
          <div class="row">
            <div class="col-lg-4 col-md-4 mt-5 mt-md-0 footer-menu">
              <ul class="list-unstyled w-100">
                <li>
                  <a href="https://andilab.it/richiedi-preventivo.php" target="_blank">Richiedi un preventivo</a>
                </li>
                <li>
                  <a href="https://andilab.it/" target="_blank">Andilab</a>
                </li>
                <!--<li>
                  <a href="https://andilab.it/project.php" target="_blank">Servizi</a>
                </li>-->
              </ul>
            </div>
            <div class="col-lg-4 col-md-4 mt-5 mt-md-0 footer-menu">
              <ul class="list-unstyled w-100">
                <li>
                  <a href="https://andilab.it/tecnologia-aziendale.php" target="_blank">Tecnologia</a>
                </li>
                <li>
                  <a href="https://andilab.it/contact.php" target="_blank">Contattaci</a>
                </li>
                <!--<li>
                  <a href="https://andilab.it/contact.php" target="_blank">Contattaci</a>
                </li>-->
              </ul>
            </div>
            <div class="col-lg-4 col-md-4 mt-5 mt-md-0 footer-menu">
              <ul class="list-unstyled">
                <li>
                  <a href="https://andilab.it/project.php" target="_blank">Servizi</a>
                </li>
                <li>
                  <a href="https://andilab.it/politica-aziendale.php" target="_blank">Politica aziendale</a>
                </li>
                <!--<li>
                  <a href="terms-and-conditions.html" target="_blank">Terms</a>
                </li>-->
              </ul>
            </div>
          </div>
          <div class="row mt-8">
            <div class="col-md-10">
              <h5 style="display: inline; margin-right: 10px;">Vuoi saperne di più? Lascia la tua email</h5> 
              <div class="subscribe-form">
                <form id="mc-form" class="mc-form">
                  <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Inserisci Email" required="">
                   
                  <input class="subscribe-btn" type="submit" name="subscribe" value="Invia">
                </form>

                <!--<small class="d-block mt-3">Get started for 1 Month free trial No Purchace required.</small>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="secondary-footer">
    <div class="container">
      <div class="copyright">
        <div class="row text-center">
          <div class="col"> © Andilab S.r.l. | Registro Imprese di Pescara Chieti - REA 417993 | P.IVA / Cod. Fisc.: 02326560683 <br>
             
              <a href="privacy-andilab.html" target="_blank">Privacy & Cookies</a>
                
             
            
           </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<!--footer end-->


</div>

<!-- page wrapper end -->


<!--back-to-top start-->

<div class="scroll-top">
  <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
  </svg>
</div>

<!--back-to-top end-->

 
<!-- inject js start -->

<!--== jquery -->
<script src="js/jquery.min.js"></script> 

<!--== bootstrap -->
<script src="js/bootstrap.bundle.min.js"></script>

<!--== jquery-appear -->
<script src="js/jquery-appear.js"></script> 

<!--== owl-carousel -->
<script src="js/owl.carousel.min.js"></script> 

<!--== magnific-popup --> 
<script src="js/jquery.magnific-popup.min.js"></script>

<!--== counter -->
<script src="js/odometer.min.js"></script>

<!--== countdown -->
<script src="js/jquery.countdown.min.js"></script> 

<!--== wow -->
<script src="js/wow.min.js"></script>

<!--== theme-script -->
<script src="js/andilab.js?v=3"></script>

<!-- inject js end -->

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>

  grecaptcha.ready(function() {
    grecaptcha.execute('6Lf0HfMqAAAAANou-wuqhN_X4NJpQfH7BtaoWnIf', {action: 'homepage'}).then(function(token) {
        // Invia il token al server per la verifica
        fetch('verifica.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'recaptcha_response=' + token
        })
        .then(response => response.text())
        .then(data => console.log('Risposta reCAPTCHA:', data));
    });
  });

</script>

</body>

</html>