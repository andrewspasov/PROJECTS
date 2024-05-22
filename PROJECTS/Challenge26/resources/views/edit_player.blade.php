<x-app-layout>
    <div class="container pt-5">
        <h1 class="text-3xl text-center py-4">Edit Player</h1>
        <div class="row">
            <div class="col-6 offset-3">
                <form action="{{ route('players.update', $player->id) }}" method="POST">
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
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $player->name) }}">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname"
                            value="{{ old('surname', $player->surname) }}">
                    </div>
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                            value="{{ old('date_of_birth', $player->date_of_birth instanceof \Carbon\Carbon ? $player->date_of_birth->format('Y-m-d') : \Carbon\Carbon::parse($player->date_of_birth)->format('Y-m-d')) }}">

                    </div>
                    <div class="mb-3">
                        <label for="team_id" class="form-label">Team</label>
                        <select class="form-control" id="team_id" name="team_id">
                            @foreach($teams as $team)
                            <option value="{{ $team->id }}" {{ $player->team_id == $team->id ? 'selected' : '' }}>
                                {{ $team->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                        class="focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Update
                        Player</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>