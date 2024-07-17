@include('commons.admin-header')
<h1>User</h1>
<table class="table table-bordered">
    <thead>
        <th>Username</th>
        <th>Albums</th>
        <th>Photos</th>
        <th>Likes</th>
    </thead>

    @foreach($users as $userDetails)
    <!-- {{$userDetails}} -->
    <tbody>
        <td>{{$userDetails->name}}</td>    
        <td>{{$userDetails->albums_count}}</td>    
        <td>{{$userDetails->totalPhotos}}</td>    
        <td>{{$userDetails->totalLikes}}</td>    
        </tbody>
    @endforeach
</table>
@include('commons.footer')


