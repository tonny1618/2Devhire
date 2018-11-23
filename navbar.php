
      <header>
         <nav class="navbar navbar-default">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
            <div class="container-fluid">
               <div class="nav navbar-nav navbar-header">
                  <a href="index.php" class="nav navbar-nav navbar-left"><img src="asset/images/logo.png" alt="logo"></a>
               </div>
               <ul class=" collapse navbar-collapse nav navbar-nav">
                  <li><a href='index.php' class="hvr-underline-from-left">Accueil</a></li>
                  <li><a href='espace_candidat.php' class="hvr-underline-from-left">Espace Candidat</a></li>
                  <li><a href='espace_client.php' class="hvr-underline-from-left">Espace Entreprise</a></li>
                  <li><a href='#' class="hvr-underline-from-left">Qui Sommes Nous ?</a></li>
                  <li><a href='contact.php' class="hvr-underline-from-left">Contact</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li><a href='connexion_espaces.php'><span class='glyphicon glyphicon-log-in'></span> Inscription / Connection </a></li>
               </ul>
            </div>
         </nav>
      </header>
      
    <?php if(isset($_SESSION['flash'])): ?>
        <?php foreach($_SESSION['flash'] as $type => $message): ?>
            <div class="alert alert-<?= $type; ?>">
                <?= $message; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>