<x-app-layout>

    <div class="container pt-5">
        <!-- Display Errors -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header py-3">
                        <h1>Create New Team</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teams.store') }}" method="POST" class="p-3">
                            @csrf
                            <div class="mb-6">
                                <label for="name" class="block mb-2 font-medium">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Name">
                            </div>
                            <div class="mb-6">
                                <label for="year_of_foundation" class="block mb-2 font-medium">Year Founded</label>
                                <input type="number" id="year_of_foundation" name="year_of_foundation" value="{{ old('year_of_foundation') }}"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Year Founded">
                            </div>
                            <button type="submit"
                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>