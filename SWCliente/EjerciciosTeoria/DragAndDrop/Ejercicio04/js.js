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


function dragStart(e){
    e.dataTransfer.setData('text/plain', e.target.id);
}

const boxes = document.querySelectorAll('.box');
boxes.forEach(box => {
 box.addEventListener('dragenter', dragEnter)
 box.addEventListener('dragover', dragOver);
 box.addEventListener('dragleave', dragLeave);
 box.addEventListener('drop', drop);
});

function dragEnter(e) {
    //Ejercicio 5 añadir el preventDefault
    e.preventDefault();
    e.target.classList.add('drag-over');
}
function dragOver(e) {
    //Ejercicio 5 añadir el preventDefault
    e.preventDefault();
    e.target.classList.add('drag-over');
}
function dragLeave(e) {
    e.target.classList.remove('drag-over');
}
function drop(e) {
    e.target.classList.remove('drag-over');
    //Ejercicio6
    // obtenemos el elemento draggable
    const id = e.dataTransfer.getData('text/plain');
    const draggable = document.getElementById(id);
    // añadimos el elemento
    e.target.appendChild(draggable);
}