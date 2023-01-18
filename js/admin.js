//VISTA TABELLE PAGINA ADMIN

let categories =document.querySelector('.lecategorie');
let categorie = document.querySelector('.categorie');

let operators = document.querySelector('.glioperatori');
let operatori = document.querySelector('.operatori');

let users = document.querySelector('.gliutenti');
let utenti = document.querySelector('.utenti');


    operators.addEventListener("click", function () {
        operatori.classList.remove('tabella');
        utenti.classList.add('tabella');
        categorie.classList.add('tabella');
    });

    users.addEventListener("click", function() {
        operatori.classList.add('tabella') ;
        utenti.classList.remove('tabella');
        categorie.classList.add('tabella');
    });

    categories.addEventListener("click", function() {
        categorie.classList.remove('tabella');
        operatori.classList.add('tabella');
        utenti.classList.add('tabella');
    });


//FUNZIONI PER LE MODALI PAGINA ADMIN

// Get the modal
let modal = document.getElementById("myModal");
let modal1 = document.getElementById("myModal1");
let modal2 = document.getElementById("myModal2");

// Get the button that opens the modal
let btn = document.getElementById("myBtn");
let btn1 = document.getElementById("myBtn1");
let btn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];
let span1 = document.getElementsByClassName("close")[0];
let span2 = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}
btn1.onclick = function() {
    modal1.style.display = "block";
}
btn2.onclick = function() {
    modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
span1.onclick = function() {
    modal1.style.display = "none";
}
span2.onclick = function() {
    modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    } else if (event.target == modal1) {
        modal1.style.display = "none";
    } else if (event.target == modal) {
        modal.style.display = "none";
    }
}

//CHIAMATA AJAX AL DATABASE

function addOperator() {
    let nameAdd = $('#name'). val();
    let emailAdd = $('#email').val();
    let passwordAdd = $('#password').val();

    $.ajax({
        url:"create_operatore.php",
        type: 'post',
        data: {
            name:nameAdd,
            email:emailAdd,
            password:passwordAdd,
        },

        success:function(data, status){
            console.log(status);
        }
    })
}

function addUser() {
    let emailAdd = $('#email1').val();
    let passwordAdd = $('#password1').val();

    $.ajax({
        url:"create_utente.php",
        type: 'post',
        data: {
            email1:emailAdd,
            password1:passwordAdd,
        },

        success:function(data, status){
            console.log(status);
        }
    })
}

function addCategory() {
    let nameAdd = $('#name2').val();

    $.ajax({
        url:"create_category.php",
        type: 'post',
        data: {
            name2:nameAdd,
        },

        success:function(data, status){
            console.log(status);
        }
    })
}