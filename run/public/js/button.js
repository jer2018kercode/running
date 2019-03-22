
$(document).ready(function() {
	// variables sélécteur
	var $liste_ingredients = $('#liste_ingredients');
	var $recette = $('#recette');
	var $ajouter = $('#ajouter');
	var $supprimer = $('#supprimer');
	
	// on sélectionne un ingredients dans la liste
	$liste_ingredients.change(function() {
		$ajouter.attr('disabled', false);
	});
	
	// on sélectionne un ingredient dans la recette
	$recette.change(function() {
		$supprimer.attr('disabled', false);
	});
	
	$ajouter.click(function() {
		$ajouter.attr('disabled', true); // on désactive le bouton
		transfertIngredient($($liste_ingredients.selector +' option:selected'), $recette);
	});
	
	$supprimer.click(function() {
		$supprimer.attr('disabled', true); // on désactive le bouton
		transfertIngredient($($recette.selector +' option:selected'), $liste_ingredients);
	});
});
 
// fonction qui va s'occuper de basculer un ingredient d'une liste à l'autre
function transfertIngredient($ingredient, $recetteArrivee) {
	// on ajoute l'option à la recette
	$('<option>', {
		value: $ingredient.val(),
		selected:'selected',	
		text: $ingredient.text()
	}).appendTo($recetteArrivee);
	
	$ingredient.remove(); // on supprime l'ingredient' de la liste de départ
}

//var timeout;

// $('#cart').on({
//   mouseenter: function() {
//     $('#cart-dropdown').show();
//   },
//   mouseleave: function() {
//     timeout = setTimeout(function() {
//       $('#cart-dropdown').hide();
//     }, 200);
//   }
// });

// // laisse le contenu ouvert à son survol
// // le cache quand la souris sort
// $('#cart-dropdown').on({
//   mouseenter: function() {
//     clearTimeout(timeout);
//   },
//   mouseleave: function() {
//     $('#cart-dropdown').hide();
//   }
// });