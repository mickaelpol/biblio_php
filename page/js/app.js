$(document).ready(function(){

  var pseudo = $('#pseudo'),
  mdp = $('#mdp'),
  test = $("#test"),
  test2 = $('#test2'),
  envoi = $("#envoi");


  $("#form").submit(function(e){

 // PSEUDO

// validation ou erreur de saisie a modifier en vonction du PHP

    if (pseudo.val().length <5 || champ.val().length >25) {
      test.addClass("has-error");
      e.preventDefault();

    }

//  MOT DE PASSE

// validation ou erreur de saisie a modifier en vonction du PHP

    if (mdp.val().length <5 || champ2.val().length >25) {
      test2.addClass("has-error");
      e.preventDefault();

    }


  })
});
