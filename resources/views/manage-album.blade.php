@include('commons.logged-in-header')
<style>
    .dragOver {
        background-color: darkgray;
        border: 3px black solid;
        color: black;
    }
</style>
<h1>Manage Album</h1>
<h4>Add new Album</h4>

<form action="{{route('update-album',['album_id'=>$album->id])}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="title">Title Album</label>
        <input type="text" class="form-control" name="title" id="title" value="{{$album->title}}">
    </div>

    <div class="mb-3">
        <label for="title">Select status</label>
        <select class="form-select" name="status" id="status" value="{{$album->status}}">
            <option value="0" {{ $album->status == 0 ? 'selected': '' }}>Public</option>
            <option value="1" {{ $album->status == 1 ? 'selected': '' }}>Private</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">
        Update
    </button>
    <button type="Reset" data-bs-toggle="modal" class="btn btn-secondary">
        Reset
    </button>
</form>
<hr class="w-100">
<div class="row">
    @foreach($album->photos as $photo)
    <div class="col-2">
        <div class="card p-3 bg-light">
            <a href="{{$photo->title}}"><img class="img-fluid" src="{{$photo->title}}" alt=""></a>
        </div>
    </div>
    @endforeach
    <div class="col-2">
        <!-- data-bs-target="#add-modal" data-bs-toggle="modal" -->
        <div class="card p-5 bg-light" id="add-image">
            <h1 class="text-center">+</h1>
        </div>
    </div>
</div>

<script>
    $(function() {

        $('#add-image').on('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation()
            $(this).addClass('dragOver')
        })

        $('#add-image').on('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation()
            $(this).removeClass('dragOver')
        })

        $('#add-image').on('drop', function(  e) {
            e.preventDefault();
            e.stopPropagation()
            $(this).removeClass('dragOver')
            // alert('image dropped')

            const files = e.originalEvent.dataTransfer.files;
            if (files.length) {
                // console.log(files[0])
                uploadFile(files[0])
            }
            // console.log(files)
        })

        // uploadFile('test')
        function uploadFile(file) {
            var formData = new FormData()
            formData.append('file', file)
            $.ajax({
                    url: '/upload/' + '{{ $album->id }}', // kena concade
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: formData,
                    contentType: false,
                    processData: false,

                    // if success
                    success: function(response) {
                        if (response.success) {
                            alert("Successfully uploaded")
                        }
                    },
                    error: function(response) {
                        alert("upload failed")
                        console.log(response.success)
                    },
                })
        }
    })
</script>
@include('commons.footer')