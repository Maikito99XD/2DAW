// seleccionamos el elemento
const item = document.querySelector('.item');
// le añadimos un manejador dragstart
item.addEventListener('dragstart',dragStart);
item.addEventListener('drag',()=>{
    console.log("drag");
});

item.addEventListener('dragend', () =>{
    console.log("dragend");
});


function dragStart(){
    this.dataTransfer.setData('text/plain', this.target.id);
}