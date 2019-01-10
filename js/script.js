$(document).ready(function(){
	$("#sol").ready(function(){
		var largeur = screen.width,
		hauteur = screen.height;
		$('input').css('height', hauteur/15);
		$('#commentaire').css('width', largeur/3.1);
		$('#commentaire').css('height', largeur/9);
	});
});
// Fonction pour faire apparaitre la partie inscription/connexion
function showPanel(){
    $("#panelUser").css("display", "none");
}