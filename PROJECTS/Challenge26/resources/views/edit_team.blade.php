<x-app-layout>
    <div class="container pt-5">
    <h1 class="text-3xl py-4 text-center">Edit Team</h1>

        <div class="row">
            <div class="col-6 offset-3">
                <form action="{{ route('teams.update', $team->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="mb-3">
                        <label for="name" class="form-label">Team Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $team->name) }}">
                    </div>

                    <div class="mb-3">
                        <label for="year_of_foundation" class="form-label">Year Founded</label>
                        <input type="number" class="form-control" id="year_of_foundation" name="year_of_foundation"
                            value="{{ old('year_of_foundation', $team->year_of_foundation) }}">
                    </div>

                    <button type="submit"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Update</button>

                </form>
            </div>
        </div>
    </div>


</x-app-layout>