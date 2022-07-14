@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Book</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{route('book.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">title</label>
                                <input type="text" name="title" class="form-control" aria-describedby="emailHelp" placeholder="title">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">author</label>
                                <input type="text" name="author" class="form-control" aria-describedby="emailHelp" placeholder="author">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">description</label>
                                <textarea type="text" name="description" rows="5" onresize="none" class="form-control" aria-describedby="emailHelp" placeholder="description"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">image</label>
                                <input type="file" name="image"  class="form-control-file">
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
