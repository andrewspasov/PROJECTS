<x-app-layout>

    <div class="container pt-5">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- Error Messages -->
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
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header py-3">
                        <h1>Teams</h1>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('teams.create') }}" class="btn btn-primary mb-3">Add a New Team</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Year Founded</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $team)
                                <tr>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->year_of_foundation }}</td>
                                    <td>
                                        <a href="{{ route('teams.edit', $team->id) }}"
                                            class="text-primary">Edit</a>
                                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST"
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