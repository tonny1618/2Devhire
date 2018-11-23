$(function () {
	$('[data-toggle="tooltip"]').tooltip()
});

$('.add').click(function(){
	var newDiv = $('<div id="blocexperience"> <div class="form-group col-md-6 col-md-offset-3"> <div class="col-md-4"> <label>De : </label> <input class="form-control" type="date" name=""> </div> <div class="col-md-4"> <label> Jusqu\'au :</label> <input class="form-control" type="date" name=""> </div> <div class="col-md-12"> <label>Détaillez votre expérience : </label><textarea class="form-control" rows="8" class="comment"></textarea> </div> </div> </div>');
	$('.blocexperience').append(newDiv);
});

 // Cacher les collapses lors d'un clic sur un autre 

 $('.btncollapse').click( function(e) {
 	$('.collapse').collapse('hide');
 });


/*--- Affichage du formulaire motivation ----*/

$('#postuler').click(function(e){
	$(".blocdetailannonce").removeClass( "col-md-8").addClass('col-md-5');
	$('#formpostuler').show(500);
});

$('#envoyermotivation').click(function(){
	$(".blocdetailannonce").removeClass('col-md-5').addClass('col-md-8');
	$('#formpostuler').hide(500);
})