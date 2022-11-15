//Array de los productos y precios
let productos = [];
let precios = [];

//La cantidad máxima de productos que el usuario nos puede decir
let cantidadMaxProductos = 5;
//Array para almacenar los datos separados del slip que nos haya pasado el usuario 
let productoPrecioTemp = [];
//Guardamos los valores que nos pase el usuario en esta variable
let productoPrecioUsuario;
//La cantidad de precios que hay
let cantidadPrecios = 0;
//La cantidad de productos que hay
let cantidadProductos = 0;
//La cantidad de productos que podrá buscar el usuario
let cantidadProductosBuscar = 3;
//El producto que quiere buscar el usuario
let productoUsuario;
//Las unidades que quiere sacar el usuario de cierto producto
let unidadesUsuario;
//Se calculará el precio del producto por las unidades del usuario y el resultado se almacenará en esta variable
let calculaPrecio = 0;
//El subtotal del calculo entre los productos del cliente
let subtotal = 0;
//Comprobación de que sea un producto repetido o no
let compruebaSiEsRepetido = false;
//Comprueba si el numero introducido es un numero o no
let compruebaSiEsNumero = false;
//Bucle para pedir productos y sus precios
for(let i = 0;i<cantidadMaxProductos;i++){
    do{
        //Le pide al usuario que le diga el producto y su precio
        productoPrecioUsuario = prompt("Indicame el producto y el precio separado por una coma.");
        //Separa lo que nos devuelva y lo añade a un array temporal el cual nos almacenará el producto y el precio
        productoPrecioTemp = productoPrecioUsuario.split(",");
        //Comprobación de que sea un producto y no un precio osea que comprueba que no sea un numero
        if(isNaN(productoPrecioTemp[0])){
            //Recibe lo que nos da la funcion compruebaRepetido
            compruebaSiEsRepetido = compruebaRepetido();
            //En caso de que esté repetido saltará el siguiente alert
            if(compruebaSiEsRepetido == true){
                alert("Este producto está repetido, por favor introduzca uno nuevo");
            }
        //En caso de que no sea un producto y han introducido numeros saldrá el siguiente alert
        }else{
            alert("No puedes introducir numeros, tienes que poner un producto valido!");
            compruebaSiEsRepetido = true;
        }
        //Comprobará que el precio sea un numero
        if(!isNaN(productoPrecioTemp[1])){
            //Se almacenará el precio en el array de precios
            precios[cantidadPrecios] = productoPrecioTemp[1];
            //Se aumentará la cantidad de precios que hay disponibles
            cantidadPrecios++;
            //Se pondrá true ya que es un numero
            compruebaSiEsNumero = false;
        //En caso de que no sea un numero saldrá el siguiente alert
        }else{
            alert("Tienes que poner un precio al producto! Ej: Manzanas,3.2");
            compruebaSiEsNumero = true;
        }
    //En caso de que alguana de las dos condiciones no se cumpla, volverá a pedir el producto y el precio
    }while(compruebaSiEsRepetido != false && compruebaSiEsNumero != false);
    //Se almacena tanto el producto
    productos[cantidadProductos] = productoPrecioTemp[0];
    cantidadProductos++;
    //Se sacarán los productos y los precios por la consola
    console.log(productos[i]+" - "+precios[i]);

}
//La variable aux nos ayudará para poder saber cuando se haya encontrado el producto
let aux = true;
//Esto es para saber la posición en el array del producto y así saber su precio también
let posicionProducto = 0;
for(let k = 0;k<cantidadProductosBuscar;k++){
    //Pregunto que está buscando el usuario
    productoUsuario = prompt("Que producto estás buscando?");
    for(let n = 0;n<productos.length;n++){
        //Lo pongo toLowerCase para que la validación sea más correcta y que así el usuario no se preocupe por las mayúsculas o minusculas
        if(productoUsuario.toLowerCase() == productos[n].toLowerCase()){
            //Se valida que ha encontrado el producto
            aux = true;
            //Se guarda la posición
            posicionProducto = n;
            //Se hace un break para poder salir del bucle y que no siga buscando
            break;
        }else{
            aux = false;
        }
    }
    //En caso de que se encuentre el producto hará lo siguiente
    if(aux == true){
        //las unidades que quiere el usuario
        unidadesUsuario = prompt("Cuantas unidades quieres del producto?");
        //Se calcula el precio parseando a Float
        calculaPrecio = parseFloat(unidadesUsuario * precios[posicionProducto]);
        //Se calcula el subtotal
        subtotal += calculaPrecio;
        //Se muestra mediante un alert al usuario
        alert("Linea: "+productos[posicionProducto]+" "+precios[posicionProducto]+" * "+unidadesUsuario+" = "+
            calculaPrecio+"\nSubtotal: "+subtotal);
    //En caso de que no se encuentre el producto, sacará el siguiente mensaje
    }else{
        alert("Producto no encontrado");
    }
}
//Sacará un mensaje de importe total
alert("Importe Total: "+parseFloat(subtotal));

/**
 * La función nos dirá si un producto que ha introducido el usuario está repetido en el array de productos
 * @returns Devolverá si es un repetido o no
 */
function compruebaRepetido(){
    //Si el array está vació simplemente devolveremos false
    if(productos.length > 0){
        for(let i = 0;i<productos.length;i++){
            //En caso de que un producto sea igual al indicado por el usuario, devolveremos true
            if(productoPrecioTemp[0].toLowerCase() == productos[i].toLowerCase()){
                return true;
            }
        }
    }

    return false;

}
