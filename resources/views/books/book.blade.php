@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List Book</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->author}}</td>
                                    <td>
                                        @if ($book->image)
                                            <img class="img-thumbnail" width="100" src="{{ asset($book->image) }}" />
                                        @endif
                                    </td>
                                    <td>{{$book->description}}</td>
                                    <td class="d-flex flex-row p-1">
                                        <div>
                                            <a href="" class="btn btn-primary" >
                                                edit
                                            </a>
                                        </div>
                                        <div >
                                            <form method="post" action="">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Delete ?');" class="btn btn-danger">delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

