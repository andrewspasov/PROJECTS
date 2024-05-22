import { fetchUsers } from './fetchUsers.js';
import axios from 'axios';


export function hideModal() {
    const modal = document.getElementById("userModal");
    modal.classList.add("hidden");
}
document.getElementById("addUserForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);
    const token = localStorage.getItem("api_token");

    axios.post("/api/admin/users", formData, {
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`,
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        }
    })
    .then(response => {
        console.log("Success:", response.data);

        const successMessageDiv = document.createElement("div");
        successMessageDiv.innerHTML = "<strong>User created successfully!</strong>";
        successMessageDiv.style.color = "green";
        document.getElementById("addUserForm").prepend(successMessageDiv);

        setTimeout(() => {
            hideModal();
            fetchUsers();
            successMessageDiv.remove();
            form.reset();
        }, 5000);
    })
    .catch(error => {
        console.error("Error:", error.response.data);

        const errorMessagesDiv = document.getElementById("errorMessages");
        errorMessagesDiv.innerHTML = "";

        if (error.response.data.errors) {
            Object.entries(error.response.data.errors).forEach(([key, messages]) => {
                messages.forEach(message => {
                    const messageParagraph = document.createElement("p");
                    messageParagraph.textContent = message;
                    errorMessagesDiv.appendChild(messageParagraph);
                });
            });
        } else if (error.response.data.message) {
            const messageParagraph = document.createElement("p");
            messageParagraph.textContent = error.response.data.message;
            errorMessagesDiv.appendChild(messageParagraph);
        }
    });
});




export function deleteUser(userId) {
    const token = localStorage.getItem("api_token");
    fetch(`/api/admin/users/${userId}`, {
        method: "DELETE",
        headers: {
            Accept: "application/json",
            Authorization: `Bearer ${token}`,
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    })
        .then((response) => {
            if (!response.ok) throw new Error("Failed to delete user");
            fetchUsers();
        })
        .catch((error) => console.error("Error:", error));
}

export function toggleUserActiveStatus(userId) {
    const token = localStorage.getItem("api_token");
    fetch(`/api/admin/users/${userId}/toggle-active`, {
        method: "PATCH",
        headers: {
            Accept: "application/json",
            Authorization: `Bearer ${token}`,
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    })
        .then((response) => {
            if (!response.ok) throw new Error("Failed to toggle user status");
            fetchUsers();
        })
        .catch((error) => console.error("Error:", error));
}

document.addEventListener("DOMContentLoaded", function () {
    fetchUsers();
});

export function openEditModal(userId) {
    axios.get(`/api/admin/users/${userId}`, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem("api_token")}`,
                Accept: "application/json",
            },
        })
        .then((response) => {
            const { data } = response;
            document.getElementById("editUserId").value = userId;
            document.getElementById("editUsername").value = data.username;
            document.getElementById("editEmail").value = data.email;
            document.getElementById("editUserModal").classList.remove("hidden");
        })
        .catch((error) => console.error("Error:", error));
}






document.getElementById("editUserForm").addEventListener("submit", function (e) {
    e.preventDefault();

    let userId = document.getElementById("editUserId").value;
    let object = {};
    new FormData(this).forEach((value, key) => { object[key] = value; });

    axios.put(`/api/admin/users/${userId}`, object, {
        headers: {
            'Authorization': `Bearer ${localStorage.getItem("api_token")}`,
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        }
    })
    .then(response => {
        console.log("Success:", response.data);

        const successMessageDiv = document.createElement("div");
        successMessageDiv.innerHTML = "<strong>User updated successfully!</strong>";
        successMessageDiv.style.color = "green";
        document.getElementById("editUserForm").prepend(successMessageDiv);

        setTimeout(() => {
            document.getElementById("editUserModal").classList.add("hidden");
            fetchUsers();
            successMessageDiv.remove();
            document.getElementById("editUserForm").reset();
        }, 5000);
    })
    .catch(errorResponse => {
        if (errorResponse.response && errorResponse.response.status === 422) {
            console.log("Validation Errors:", errorResponse.response.data);
            const editErrorMessages = document.getElementById("editErrorMessages");
            editErrorMessages.innerHTML = "";
            Object.keys(errorResponse.response.data.errors).forEach(field => {
                const message = errorResponse.response.data.errors[field].join(" ");
                editErrorMessages.innerHTML += `<p>${message}</p>`;
            });
        } else {
            console.error("Other Error:", errorResponse);
        }
    });
});

