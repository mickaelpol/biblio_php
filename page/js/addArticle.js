$(document).ready(function () {
	
	
	
		pseudo = $('#pseudo'),
			mdp = $('#mdp'),
			error1 = $("#error1"),
			error2 = $('#error2'),
			textPseudo = $('#textpseudo'),
			textmdp = $('#textmdp'),
			passClair = $('#passClair'),
	
	
			passClair.click(function(){
				if (mdp.attr('type') === "password") {
					mdp.attr('type', 'text');
				} else {
					mdp.attr('type', 'password');
				}
			})	
	
			$("#form").submit(function (e) {
	
				error1.removeClass("has-error");
				error2.removeClass("has-error");
	
				// PSEUDO
	
				// validation ou erreur de saisie a modifier en fonction du PHP
	
				if (pseudo.val().length < 5 || pseudo.val().length > 45) {
					error1.addClass("has-error");
					textPseudo.html("<strong class='text-danger'><i class='glyphicon glyphicon-remove'></i> 5 caractères min</strong>");
					e.preventDefault();
	
				} else {
					error1.removeClass("has-error").addClass("has-success");
					textPseudo.html("<strong class='text-success'><i class='glyphicon glyphicon-ok'></i></strong>");
				}
	
				//  MOT DE PASSE
	
				// validation ou erreur de saisie a modifier en fonction du PHP
	
				if (mdp.val().length < 5 || mdp.val().length > 255) {
					error2.addClass("has-error");
					textmdp.html("<strong class='text-danger'><i class='glyphicon glyphicon-remove'></i> 5 caractères min</strong>");
					e.preventDefault();
				} else {
					error2.removeClass("has-error").addClass("has-success");
					textmdp.html("<strong class='text-success'><i class='glyphicon glyphicon-ok'></i></strong>");
				}
			});
	
	
	});