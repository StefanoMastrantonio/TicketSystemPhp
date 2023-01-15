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

let users = document.querySelector('.gliutenti');
let utenti = document.querySelector('.utenti');

users.addEventListener("click", function() {
    utenti.classList.toggle('active');
});

let avat = document.querySelector('.avatar');
let actions = document.querySelector('.actions');

avat.addEventListener("click", function() {
    actions.classList.toggle('active');
})