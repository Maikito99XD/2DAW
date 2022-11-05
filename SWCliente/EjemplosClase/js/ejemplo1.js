console.log('-- Capçaleras h1 amb classe secundari --');
let elementsTitols = document.querySelectorAll('h1.secundari');
for (let i=0; i<elementsTitols.length; i++) {
 console.log(elementsTitols[i].textContent);
}
console.log("Elementos documentElement");
console.log(document.documentElement);
console.log("Elementos head");
console.log(document.head);
console.log("Elementos body");
console.log(document.body);
console.log("Elementos title");
console.log(document.title);
console.log("Elementos link");
console.log(document.link);
console.log("Elementos form");
console.log(document.form);
console.log("Elementos images");
console.log(document.images);
console.log("Elementos scripts");
console.log(document.scripts);
