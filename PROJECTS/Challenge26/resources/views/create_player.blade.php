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
                        <h1>Create New Player</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('players.store') }}" method="POST" class="p-3">
                            @csrf
                            <div class="mb-6">
                                <label for="name" class="block mb-2 font-medium">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Name">
                            </div>

                            <div class="mb-6">
                                <label for="surname" class="block mb-2 font-medium">Surname</label>
                                <input type="text" id="surname" name="surname" value="{{ old('surname') }}"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Surname">
                            </div>

                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control border border-gray-300 rounded-lg"
                                    id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                            </div>
                            <div class="mb-3">
                                <label for="team_id" class="form-label">Team</label>
                                <select class="form-control" id="team_id" name="team_id">
                                    <option value="" disabled selected>Select Team</option>

                                    @foreach($teams as $team)
                                    <option value="{{ $team->id }}" {{ old('team_id')==$team->id ? 'selected' : '' }}>
                                        {{ $team->name }}
                                    </option> @endforeach
                                </select>
                            </div>
                            <button type="submit"
                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>