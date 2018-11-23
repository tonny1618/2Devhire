 <!-- Search Bar -->
 <div class="container-fluid" id="blocksearchbar">
   <h2>Recherche</h2>
   <div class="col-md-6 col-sm-12 col-xs-12" id="searchbar">
      <form methode="get" action="listeAnnonces.php" class="navbar-form" role="search">
         <div class="input-group add-on">
            <input class="form-control inputsearch" placeholder="Recherche" name="recherche" id="srch-term" type="text"  required="required">
         </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12" id="ville">
         <div class="input-group add-on" >
            <input class="form-control  inputsearch" placeholder="Ville" name="ville" id="ville" type="text" required="required" >
            <div class="input-group-btn" >
               <button class="btn btn-default" id="boutonRecherche" type="submit"><i class="glyphicon glyphicon-arrow-right accueil" ></i></button>
            </div>
         </div>
      </div>
   </form>
</div>