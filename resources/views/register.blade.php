@include('commons.header')
<h1>Register</h1>
<form action="{{route('register-user')}}" method="post">
    @if($errors->any())
    <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    </ul>
    @endif
    @csrf
    <div class="mb-3">
        <label for="Name">Name:</label>
        <input class="form-control" type="text" id="name" name="name">
    </div>

    <div class="mb-3">
        <label for="password">Password:</label>
        <input class="form-control" type="password" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="password_confirmation">Password Confimation:</label>
        <input class="form-control" type="text" id="password_confirmation" name="password_confirmation">
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
    <button class="btn btn-secondary" type="reset">Reset</button>
</form>
@include('commons.footer')


