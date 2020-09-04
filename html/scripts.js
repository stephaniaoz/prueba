
function mensaje(){
	/* A partir del document es de donde puedo acceder a los diferentes nodos del DOM */
	var mensaje = document.getElementById("mensajeJS");
	alert("Hola mundo " + mensaje.value);
}