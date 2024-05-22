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
                        <h1>Create New Match</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('matches.store') }}" method="POST" class="p-3">
                            @csrf
                            <div class="d-flex align-items-center">
                                <label for="team1_id" class="form-label pr-2 pt-1">Home Team</label>
                                <select id="team1_id" name="team1_id"
                                    onchange="fetchPlayers('team1_id', 'players_team1')">
                                    <option value="" disabled {{ old('team1_id') ? '' : 'selected' }}>Team 1</option>
                                    @foreach($teams as $team)
                                    <option value="{{ $team->id }}" {{ old('team1_id')==$team->id ? 'selected' : '' }}>
                                        {{ $team->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>


                            <div id="players_team1" class="pt-3" style="display:none;">
                                <label>Players of Team 1</label>
                                <div id="players_team1_checkboxes"></div>
                            </div>

                            <div class="d-flex align-items-center pt-3">
                                <label for="team2_id" class="form-label pr-2 pt-1">Guest Team</label>
                                <select id="team2_id" name="team2_id"
                                    onchange="fetchPlayers('team2_id', 'players_team2')">
                                    <option value="" disabled {{ old('team2_id') ? '' : 'selected' }}>Team 2</option>
                                    @foreach($teams as $team)
                                    <option value="{{ $team->id }}" {{ old('team2_id')==$team->id ? 'selected' : '' }}>
                                        {{ $team->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>


                            <div id="players_team2" class="pt-3" style="display:none;">
                                <label>Players of Team 2</label>
                                <div id="players_team2_checkboxes"></div>
                            </div>

                            <!-- Match Date Input -->
                            <div class="mb-3">
                                <label for="match_date" class="form-label">Date</label>
                                <input type="date" class="form-control border border-gray-300 rounded-lg"
                                    id="match_date" name="match_date" value="{{ old('match_date') }}" min="{{ now()->format('Y-m-d') }}">
                            </div>

                            <button type="submit"
                                class="btn bg-green-600">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function fetchPlayers(teamIdElement, playersDivElement) {
            let teamId = document.getElementById(teamIdElement).value;
            let playersDiv = document.getElementById(playersDivElement + '_checkboxes');

            fetch(`/fetch-players/${teamId}`)
                .then(response => response.json())
                .then(data => {
                    playersDiv.innerHTML = '';
                    data.forEach(player => {
                        playersDiv.innerHTML += `
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="players[]" value="${player.id}" id="player_${player.id}">
                            <label class="form-check-label" for="player_${player.id}">
                                ${player.name} ${player.surname}
                            </label>
                        </div>
                    `;
                    });
                    document.getElementById(playersDivElement).style.display = 'block';
                });
        }
    </script>
</x-app-layout>