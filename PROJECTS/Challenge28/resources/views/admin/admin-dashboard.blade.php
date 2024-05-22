<x-app-layout>

    <!-- Add User Modal  -->
    <div id="userModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Add New User</h3>
                            <div class="absolute top-0 right-0 pt-4 pr-4">
                                <button id="closeModalButton" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Close</span>
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-2">
                                <form id="addUserForm">
                                    <div id="errorMessages"></div>
                                    <input type="text" name="username" placeholder="Username" class="mt-1 p-2 w-full" />
                                    <input type="email" name="email" placeholder="Email" class="mt-1 p-2 w-full" />
                                    <input type="password" name="password" placeholder="Password"
                                        class="mt-1 p-2 w-full" />
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mt-4">Add
                                        User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container p-5 m-5">
        <h1 class="text-3xl">Admin Dashboard</h1>
        <p class="text-2xl pt-5">Welcome, {{ Auth::user()->username }}!</p>
    </div>


    <div class="container mx-auto px-4 sm:px-8">
        <button id="openModalButton" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Add
            User</button>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                ID
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Username
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Email
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="usersList">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>


    <!-- Edit User Modal -->
    <div id="editUserModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="edit-modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="edit-modal-title">Edit User</h3>
                            <div class="absolute top-0 right-0 pt-4 pr-4">
                                <button id="closeModalButton2" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Close</span>
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-2">
                                <form id="editUserForm">
                                    <div id="errorMessages"></div>
                                    <input type="hidden" name="user_id" id="editUserId">
                                    <div id="editErrorMessages"></div>
                                    <input type="text" id="editUsername" name="username" placeholder="Username"
                                        class="mt-1 p-2 w-full" />
                                    <input type="email" id="editEmail" name="email" placeholder="Email"
                                        class="mt-1 p-2 w-full" />
                                    <div>
                                        <label for="password">New Password (leave blank if not changing)</label>
                                        <input type="password" id="password" name="password" placeholder="New Password">
                                    </div>
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mt-4">Update
                                        User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>