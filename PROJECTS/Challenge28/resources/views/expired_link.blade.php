<div class="container">
    <h2>Activation Link Expired</h2>
    <p>Your activation link has expired. Please enter your email to receive a new activation link.</p>

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif


    <form method="POST" action="{{ route('activation.resend') }}">
        @csrf
        <div class="form-group">
            <input type="hidden" name="email" value="{{ request()->query('email') }}">
            <p>Email: {{ request()->query('email') }}</p>

        </div>
        <button type="submit" class="btn btn-primary">Resend Activation Link</button>
    </form>
</div>