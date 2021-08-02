
let div = document.getElementById('modal');
let btnShow = document.getElementById('show-modal');
let btnHide = document.getElementById('hide-modal');

function showModal(){
    let div = document.getElementById('modal');
    div.classList.add("show-modal");
}
function hideModal(){
    let div = document.getElementById('modal');
    div.classList.remove("show-modal");
}