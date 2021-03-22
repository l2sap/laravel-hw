<h3>Привет, @if(Auth::check()){{ Auth::user()->name }} @endif</h3>
<br>
<p><strong><a href="{{route('admin.admin')}}">В админку</a></strong>
    <br>
    <img src="{{ Auth::user()->avatar }}" style="width:200px">
<form method="post" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Выход</button>
</form>
</p>