<?php require ("head.php") ?>
<?php require("navbar.php")?>

<fieldset class="doc-candidat">
	<label class="bvn-candidat">	
		Bonjour "..."
	</label>

	<ul class="nav nav-tabs nav-justified">
    	<li class="active"><a data-toggle="tab" href="#contrats">Contrats</a></li>
   		<li><a data-toggle="tab" href="#bulletins">Bulletins de paie</a></li>
 	</ul>

  	<div class="tab-content">
    	<div id="contrats" class="tab-pane fade in active">
      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    	</div>
    	<div id="bulletins" class="tab-pane fade">
      		<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    	</div>
  	</div>
</fieldset>
<?php require("footer.php");?>