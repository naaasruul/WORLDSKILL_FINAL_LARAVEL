@include('commons.logged-in-header')
<h1>Album</h1>
@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif

<div class="row">
    @foreach($albums as $album)
    <div class="col-2">
        <div class="card bg-light text-center">
            <a style="text-decoration: none; color:black;" href="{{route('manage-album',['album_id'=>$album->id])}}">
            <div class="bg-light" style="height: 150px;"></div>
            <p class="">{{$album->title}}</p>
            </a>
        </div>
    </div>
    @endforeach
    <div class="col-2">
        <div class="card p-5 bg-light" data-bs-target="#add-modal" data-bs-toggle="modal">
            <h1 class="text-center">+</h1>
        </div>
    </div>
</div>

<div class="modal" id="add-modal">
    <div class="modal-dialog">
        <div class="modal-content p-5">
            <h4>Add new Album</h4>

            <form action="{{route('add-album')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title">Title Album</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>

                <div class="mb-3">
                    <label for="title">Select status</label>
                    <select class="select" name="status" id="status">
                        <option value="0">Public</option>
                        <option value="1">Private</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    add
                </button>
                <button type="Reset" data-bs-toggle="modal" class="btn btn-secondary">
                    Reset
                </button>
            </form>
        </div>
    </div>
</div>
@include('commons.footer')