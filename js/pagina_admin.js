let item = document.getElementById('operator');
item.addEventListener("click", function(e) {
    e.preventDefault();
    item.classList.add('active');
    setTimeout(()=>{
        location.href="form_creazione_operatore.php";
    }, 1000);
})