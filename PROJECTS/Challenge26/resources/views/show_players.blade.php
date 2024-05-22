<x-app-layout>

    <div class="container pt-5">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header py-3">
                        <h1>Players</h1>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('players.create') }}" class="btn btn-primary mb-3">Add a New Player</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Team</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($players as $player)
                                <tr>
                                    <td>{{ $player->name }} {{ $player->surname }}</td>
                                    <td>{{ \Carbon\Carbon::parse($player->date_of_birth)->format('Y-m-d') }}</td>
                                    <td>{{ $player->team->name }}</td>
                                    <td>
                                        <a href="{{ route('players.edit', $player->id) }}" class="text-primary">Edit</a>
                                        <form action="{{ route('players.destroy', $player->id) }}" method="POST"
                                            style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-primary">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>