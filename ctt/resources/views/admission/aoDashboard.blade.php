<h2>Admission Dashboard</h2>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="#" onclick="event.preventDefault();
        this.closest('form').submit();">Logout</a>
</form>
