let bookWithMe = document.querySelector("#book-with-me");
let modal = document.querySelector("#modal");
let closeModal = document.querySelector("#close-modal");
bookWithMe.addEventListener('click',()=>{
    modal.classList.add("show");
});
closeModal.addEventListener('click',()=>{
    modal.classList.remove("show");
});