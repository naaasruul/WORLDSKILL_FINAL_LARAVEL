@include('commons.header')
<h1>login</h1>
<form action="{{route('login-user')}}" method="POST">
    @if($errors->any())
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    @endif
    @csrf
    <div class="mb-3">
        <label for="name">Username:</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>

    <div class="mb-3">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <button type="submit" class="btn btn-secondary">Reset</button>
</form>
@include('commons.footer')


