<?php require ("head.php") ?>
<?php require("navbar.php")?>
<div id="notation">
<fieldset>
	<div>
		<h2>Notation</h2>
	</div>
	<table id="tablenotation">
		<tr><th>Date</th><th>Entreprise</th><th>Interimaire</th><th>Mission</th><th>Note</th><th>Modifier</th><th>Valider</th></tr>
		<?php
		$bdd=new PDO("mysql: host=localhost;charset=utf8;dbname=Commerciale;port=3307", 'root', 'root');
		$SQLQuery='SELECT '

		<tr>
			<td>	
				<select name="notation" id="champnotation">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</td>
		</tr>
	</table>

</fieldset>
</div>

<?php require("footer.php")?>