


function comenzar(){
   var boton=document.getElementById("grabar");   
   boton.addEventListener("click", itemNuevo)
}

function itemNuevo(){
	var clave=document.getElementById("clave").value;
	var valor=document.getElementById("valor").value;
	
	sessionStorage.setItem(clave,valor);
	
	leerMostrar();
	
}

function eliminarTodo(){
	sessionStorage.clear();
	leerMostrar();
}

function eliminar(claveItem){
	sessionStorage.removeItem(claveItem);
	leerMostrar();
}

function leerMostrar(){


	//Ejercicio 2
		var zonaDatos=document.getElementById("zonadatos");
		zonaDatos.innerHTML = '<div><button onclick="eliminarTodo()"> Eliminar todo </button></div>';
		
		for(let i = 0;i<sessionStorage.length;i++){
			var clave2 = sessionStorage.key(i);
			var dato2 = sessionStorage.getItem(clave2);
			zonaDatos.innerHTML +="<div>Clave: " + clave2 + " -- " + "Valor: " + dato2 + "<button onclick=eliminar('"+clave2+"')> Eliminar</button></div>";
		}


	//Ejercicio 1
	document.getElementById("clave").value = "";
	document.getElementById("valor").value = "";
	
}


window.addEventListener("load",comenzar);
