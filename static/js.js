function marcar(nav)
{
	document.getElementById("nav_queE").setAttribute("class", "");
	document.getElementById("nav_bweps").setAttribute("class", "");
	document.getElementById("nav_contact").setAttribute("class", "");
	
	document.getElementById(nav).setAttribute("class", "active");
}
