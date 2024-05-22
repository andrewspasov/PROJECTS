<div class="container p-5 m-5">
    <h1 class="text-3xl">User Dashboard</h1>
    <p class="text-2xl pt-5 pb-5">Welcome, {{ Auth::user()->username }}!</p>



    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>
</div>