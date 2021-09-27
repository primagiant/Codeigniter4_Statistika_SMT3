const modal = document.getElementById("modal");
const openModal = document.getElementById("openModal");
const closeModal = document.getElementById("closeModal");

openModal.addEventListener("click", function () {
    modal.classList.remove("hidden");
    modal.classList.add("flex");
})

closeModal.addEventListener("click", function () {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
})


const editModal = document.getElementById("editModal");
const openEditModal = document.querySelectorAll(".openEditModal");
const closeEditModal = document.getElementById("closeEditModal");
const editInput = document.getElementById("editInput");
const skorInput = document.getElementById("skor_id");

openEditModal.forEach(e => {
    e.addEventListener("click", function () {
        editModal.classList.remove("hidden");
        editModal.classList.add("flex");
        editInput.value = e.parentElement.parentElement.previousElementSibling.innerHTML;
        skorInput.value = e.parentElement.parentElement.parentElement.children[0].innerHTML;
    })
})

if (closeEditModal !== null) {
    closeEditModal.addEventListener("click", function () {
        editModal.classList.add("hidden");
        editModal.classList.remove("flex");
    })
}

const editDataModal = document.getElementById("editDataModal");
const openEditDataModal = document.querySelectorAll(".openEditDataModal");
const closeEditDataModal = document.getElementById("closeEditDataModal");
const editDataInput = document.getElementById("editDataInput");
const oldNama = document.getElementById("oldNama");


openEditDataModal.forEach(e => {
    e.addEventListener("click", function () {
        editDataModal.classList.remove("hidden");
        editDataModal.classList.add("flex");
        editDataInput.value = e.parentElement.previousElementSibling.children[0].innerHTML;
        oldNama.value = e.parentElement.previousElementSibling.children[0].innerHTML;
    })
})

if (closeEditDataModal !== null) {
    closeEditDataModal.addEventListener("click", function () {
        editDataModal.classList.add("hidden");
        editDataModal.classList.remove("flex");
    })
}