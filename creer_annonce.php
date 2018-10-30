<?php require ("head.php") ?>
<?php require("navbar.php")?>

<div id="creerannonce">
<div class="container">
  <h2>Déposer votre annonce</h2>

    <div class="form-group col-md-12">
      <div class="row">
      <label for="titre" >Titre de l'annonce : </label>
    </div>
    <span class="col-md-6">
        <input type="text" class="form-control" name="" value="">
      </span>
    </div>

    <div class="form-group col-md-12">
      <label for="texte_annonce">Texte annonce : </label>
      <textarea rows="5" class="form-control" name=""></textarea>
    </div>

    <div class="form-group col-md-12">
      <label for="compétences">Listes des compétences nécessaires : </label>
      <div class="checkbox">
        <label><input type="checkbox" value="">Compétences 1</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="">Compétences 2</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="">Compétences 3</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="">Compétences 4</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="">Compétences 5</label>
      </div>
    </div>

    <div id="blocexperience" class="form-group col-md-6 col-md-offset-3">
      <div class="col-md-4">
        <label>De : </label>
        <input class="form-control" type="date"  name="">

      </div>

      <div class="col-md-4">
        <label> Jusqu'au :</label>
        <input class="form-control" type="date"  name="">
      </div>

      <div class="col-md-12 col-md-offset-10">
    <div class="form-group col-md-6">
      <button type="submit" class="btn btn-secondary btn-lg hvr-bounce-to-right">Envoyer</button>
    </div>
    <div class="form-group col-md-6">
      <button type="reset" class="btn btn-secondary btn-lg hvr-bounce-to-right">Annuler</button>
    </div>
  </div>

  </div>

</div>
</div>


<?php require('footer.php') ?>