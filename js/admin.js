let categories =document.querySelector('.lecategorie');
let categorie = document.querySelector('.categorie');

categories.addEventListener("click", function() {
    categorie.classList.toggle('active');
});

let operators = document.querySelector('.glioperatori');
let operatori = document.querySelector('.operatori');

operators.addEventListener("click", function() {
    operatori.classList.toggle('active');
});