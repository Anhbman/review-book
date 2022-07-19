@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa Review Sách</div>
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{route('book.update',$book->id)}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Tên sách</label>
                                <input type="text" value="{{$book->title}}" name="title" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Tác Giả</label>
                                <input type="text" value="{{$book->author}}" name="author" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Nội dung book review</label>
                                <textarea type="text" name="description" rows="5" onresize="none" class="form-control" aria-describedby="emailHelp">{{$book->description}}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Ảnh Sách</label>
                                <div>
                                    @if ($book->image)
                                        <img class="img-thumbnail" width="120px" src="{{ asset($book->image) }}" alt="{{ $book->name }}" />
                                    @endif
                                    <input class="form-control " type="file" id="image" name="image">
                                </div>
                            </div>

                            <a href="{{route('book.index')}}" class="btn btn-secondary">Quay lại</a>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
