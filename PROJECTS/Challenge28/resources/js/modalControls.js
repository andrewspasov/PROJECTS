import { fetchUsers } from './fetchUsers.js';

import { openEditModal } from './userActions.js';



document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("userModal");
    const openModalButton = document.getElementById("openModalButton");
    const editModal = document.getElementById("editUserModal");

    const closeModalButton = document.getElementById("closeModalButton");
    const closeModalButton2 = document.getElementById("closeModalButton2");

    openModalButton.addEventListener("click", function () {
        modal.classList.remove("hidden");
    });

    closeModalButton.addEventListener("click", function () {
        modal.classList.add("hidden");
    });

    closeModalButton2.addEventListener("click", function () {
        editModal.classList.add("hidden");
    });

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.classList.add("hidden");
        }
    });
});
