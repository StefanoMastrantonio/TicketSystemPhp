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

// Get the modal
let modal = document.getElementById("myModal");

// Get the button that opens the modal
let btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }

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

// Get the modal
let modal1 = document.getElementById("myModal1");

// Get the button that opens the modal
let btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
let span1 = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn1.onclick = function() {
    modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
    modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal1) {
//         modal1.style.display = "none";
//     }
// }

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

let modal2 = document.getElementById("myModal2");

// Get the button that opens the modal
let btn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
let span2 = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn2.onclick = function() {
    modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
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