$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

 $('#add').click(function(){
  var newDiv = $('<div class="col-md-12 col-md-offset-11" > <span id="add" class="glyphicon glyphicon-plus " data-toggle="tooltip" data-placement="top" title="Ajouter nouvelle expérience" ></span></div><div id="blocexperience" class="form-group col-md-6 col-md-offset-3"><div class="col-md-4"><label>De : </label><input class="form-control" type="date"  name=""></div><div class="col-md-4"><label> Jusqu\'au :</label><input class="form-control" type="date"  name=""></div><div class="col-md-12"><label>Détaillez votre expérience : </label><textarea class="form-control" rows="8"  id="comment"></textarea></div></div>')
  $('#blocexperience').append(newDiv);
});