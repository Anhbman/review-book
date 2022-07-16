@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Danh sách sách review</span>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Tác Giả</th>
                                <th>Ảnh</th>
                                <th>Nội dung</th>
                                <th>Lượt xem</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td class="">{{$book->title}}</td>
                                    <td>{{$book->author}}</td>
                                    <td>
                                        @if ($book->image)
                                            <img class="img-thumbnail" width="100" src="{{ asset($book->image) }}" />
                                        @endif
                                    </td>
                                    <td>
                                        <p style="width: 500px;overflow: hidden;white-space: nowrap; text-overflow: ellipsis;">
                                            {{$book->description}}
                                        </p>
                                    </td>
                                    <td>{{$book->view}}</td>
                                    <td class="d-flex flex-row p-1">
                                        <div class="p-1">
                                            <a href="{{route('book.edit',$book->id)}}" class="btn btn-primary" >
                                                sửa
                                            </a>
                                        </div>
                                        <div class="p-1">
                                            <form method="post" action="{{route('book.destroy',$book->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('bạn muốn xóa review book này?');" class="btn btn-danger">xóa</button>
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

