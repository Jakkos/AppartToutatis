<script type="text/javascript">
function toggle_div(id, id2) { // On déclare la fonction toggle_div qui prend en param le bouton et un id
  var div = document.getElementById(id); // On récupère le div ciblé grâce à l'id
  var div2 = document.getElementById(id2); // on récupère le div 2 ciblé grâce à l'id
  if(div.style.display=="none") { // Si le div est masqué...
    div.style.display = "block"; // ... on l'affiche...
	div2.style.display = "none"; // ... on masque l'autre
  }
}

function toggle_div(id, id2, id3) { // On déclare la fonction toggle_div qui prend en param le bouton et un id
  var div = document.getElementById(id); // On récupère le div ciblé grâce à l'id
  var div2 = document.getElementById(id2);
  var div3 = document.getElementById(id3); // on récupère le div 2 ciblé grâce à l'id
  if(div.style.display=="none") { // Si le div est masqué...
    div.style.display = "block"; // ... on l'affiche...
	div2.style.display = "none"; // ... on masque l'autre
	div3.style.display = "none"; // ... on masque l'autre
  }
}

function toggle_div(id, id2, id3, id4) { // On déclare la fonction toggle_div qui prend en param le bouton et un id
  var div = document.getElementById(id); // On récupère le div ciblé grâce à l'id
  var div2 = document.getElementById(id2);
  var div3 = document.getElementById(id3);
  var div4 = document.getElementById(id4); // on récupère le div 2 ciblé grâce à l'id
  if(div.style.display=="none") { // Si le div est masqué...
    div.style.display = "block"; // ... on l'affiche...
	div2.style.display = "none"; // ... on masque l'autre
	div3.style.display = "none"; // ... on masque l'autre
	div4.style.display = "none"; // ... on masque l'autre
  }
}
</script>