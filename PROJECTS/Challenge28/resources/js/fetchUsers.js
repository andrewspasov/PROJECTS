document.addEventListener("DOMContentLoaded", function () {
    fetchUsers();
});

export function fetchUsers() {
    fetch("/api/admin/users", {
        method: "GET",
        headers: {
            Accept: "application/json",
            Authorization:
                "Bearer 1|7lAuTzXYGRxwXuNZ5B47ee38xLRZmPZPKGU8twDic1a7b4a9",
        },
    })
        .then((response) => response.json())
        .then((data) => {
            const usersList = document.getElementById("usersList");
            usersList.innerHTML = ""; // Clear existing users
            data.forEach((user) => {
                const tr = document.createElement("tr");
                tr.innerHTML = `
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">${user.id}</p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <div class="flex items-center">
                <div class="ml-3">
                    <p class="text-gray-900 whitespace-no-wrap">
                        ${user.username}
                    </p>
                </div>
            </div>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">${user.email}</p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                <span class="relative">${
                    user.is_active ? "Active" : "Inactive"
                }</span>
            </span>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
            <button onclick="openEditModal(${
                user.id
            })" class="text-indigo-600 hover:text-indigo-900">Edit</button>
            <button onclick="deleteUser(${
                user.id
            })" class="text-red-600 hover:text-red-900">Delete</button>
            ${
                user.is_active
                    ? `<button onclick="toggleUserActiveStatus(${user.id})" class="text-yellow-600 hover:text-yellow-900">Deactivate</button>`
                    : ""
            }
        </td>`;
                usersList.appendChild(tr);
            });
        })
        .catch((error) => console.error("Error:", error));

}
