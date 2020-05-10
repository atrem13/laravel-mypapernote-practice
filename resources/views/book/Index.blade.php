@extends('templates.template')
@section('content')
    <div class="clearfix">
        <div class="float-left">
            <form class="form-inline" action="{{route('books.import')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imported_file"/>
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>
                <button style="margin-left: 10px;" class="btn btn-info" type="submit">Import</button>
            </form>
        </div>
        <div class="float-right">
            <form action="{{route('books.export')}}" enctype="multipart/form-data">
                <button class="btn btn-dark" type="submit">Export</button>
            </form>
        </div>
    </div>
    <br/>

    @if(count($books))
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Author</td>
            </tr>
            </thead>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->author}}</td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
