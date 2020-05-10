@extends('templates.template')
@section('content')
{{--  reference https://www.mynotepaper.com/laravel-multiple-image-upload-with-dropzonejs  --}}
    <h3 class="text-center" style="margin-top: 50px;">Laravel Multiple Image Upload Using DropzoneJS</h3><br>
    <form method="post" action="{{route('image_upload.store')}}" enctype="multipart/form-data"
        class="dropzone" id="dropzone">
        @csrf
    </form>

@endsection

@section('script')
    <script type="text/javascript">
        Dropzone.options.dropzone =
            {
                maxFilesize: 12,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function (file) {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ route("image_upload.delete") }}',
                        data: {filename: name},
                        success: function (data) {
                            console.log("File has been successfully removed!!");
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                success: function (file, response) {
                    console.log(response);
                },
                error: function (file, response) {
                    return false;
                }
            };
    </script>
@endsection

