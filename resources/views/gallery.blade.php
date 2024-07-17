@include('commons.logged-in-header')
<h1>Gallery</h1>
<div class="row">
@foreach($albums as $album)
<div class="col-2"> 
    <div class="card p-5">
        <p>{{$album->title}}</p>
        <p>{{$album->user->name}}</p>
    </div>


</div>
@endforeach
</div>

@include('commons.footer')