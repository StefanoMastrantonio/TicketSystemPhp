let modal = document.getElementById("myModal");
let btn = document.getElementById("myBtn");
let span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

function addTicket() {
    let titleAdd = $('#title'). val();
    let textAdd = $('#text').val();
    let categoryAdd = $('#category').val();
    let priorityAdd = $('#priority').val();

    $.ajax({
        url:"create_ticket.php",
        type: 'post',
        data: {
            title:titleAdd,
            text:textAdd,
            category:categoryAdd,
            priority:priorityAdd
        },

        success:function(data, status){
            console.log(status);
        }
    })
};



