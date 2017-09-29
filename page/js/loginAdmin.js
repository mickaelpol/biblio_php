$(document).ready(function(){

	pseudo = $('#pseudo'),
	mdp = $('#mdp'),
	error1 = $("#error1"),
	error2 = $('#error2'),
	textpseudo = $('#textPseudo'),
	textMdp = $('#textMdp'),


	$("#form").submit(function(e){

		error1.removeClass("has-error");
		error2.removeClass("has-error");

 // PSEUDO
 
// validation ou erreur de saisie a modifier en fonction du PHP

if (pseudo.val().length <5 || pseudo.val().length >45) {
	error1.addClass("has-error");
	textpseudo.html("<strong class='text-danger'> : minimum de 5 à 45 caractères</strong>");
	e.preventDefault();

}
else { 
	error1.removeClass("has-error"); 
	error1.addClass("has-success");
	textpseudo.remove();
}

//  MOT DE PASSE

// validation ou erreur de saisie a modifier en fonction du PHP

if (mdp.val().length <5 || mdp.val().length >25) {
	error2.addClass("has-error");
	textMdp.html("<strong class='text-danger'> : minimum de 5 à 45 caractères</strong>");
	e.preventDefault();

}
else { 
	error2.removeClass("has-error"); 
	error2.addClass("has-success");
	textMdp.remove();
}


});

	
});


