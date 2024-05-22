<x-app-layout>
    <div class="container pt-5">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header py-3">
                        <h1>Matches</h1>
                    </div>
                    <div class="card-body">
                        @if(auth()->check() && auth()->user()->isAdmin())
                        <div class="d-flex justify-content-end py-2">
                            <a href="{{ route('matches.create') }}" class="btn btn-primary">Add New Match</a>
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Team 1</th>
                                    <th>Team 2</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($matches as $match)
                                <tr>
                                    <td>{{ $match->team1->name }}</td>
                                    <td>{{ $match->team2->name }}</td>
                                    <td>
                                        @if(isset($match->score_team_1) && isset($match->score_team_2))
                                        {{ $match->score_team_1 }} - {{ $match->score_team_2 }}
                                        @else
                                        /
                                        @endif

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>