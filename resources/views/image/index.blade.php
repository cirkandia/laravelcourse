@extends('layouts.app')
@section("title", "Image Storage - DI")
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload image</div>
                    <div class="card-body">

                        <form action="{{ route('image.save') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Image:</label>
                                <input type="file" name="profile_image" id="image-input" class="form-control" />
                            </div>
                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        </form>

                        <div class="mt-3">
                            <h5 id="preview-title">
                                {{ file_exists(public_path('storage/test.png')) ? 'Current Image:' : 'Selected Preview:' }}
                            </h5>
                            <img id="image-preview"
                                src="{{ file_exists(public_path('storage/test.png')) ? asset('storage/test.png') . '?t=' . filemtime(public_path('storage/test.png')) : '' }}"
                                class="img-fluid img-thumbnail {{ file_exists(public_path('storage/test.png')) ? '' : 'd-none' }}"
                                style="max-height: 300px;" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('image-input').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const preview = document.getElementById('image-preview');
                const title = document.getElementById('preview-title');

                preview.src = URL.createObjectURL(file);
                preview.classList.remove('d-none');
                title.textContent = 'Selected Preview:';
            }
        });
    </script>
@endsection