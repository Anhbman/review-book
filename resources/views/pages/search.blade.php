@extends('pages.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <nav aria-label="breadcrumb" class="mx-3 mt-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">tìm kiếm</li>
                        </ol>
                    </nav>
                    <div class="card-header">Sách review</div>

                    <div class="card-body">
                        @if(count($books) == 0)
                            <p>không tìm thấy .....</p>
                        @else
                        @foreach($books as $book)
                            <a class="row mt-1 text-decoration-none" style="color:black;" href="{{route('bookReview',$book->id)}}">
                                <div class="col-2">
                                    <img height="75" width="75" src="{{$book->image}}" alt="{{$book->name}}">
                                </div>
                                <div class="col-10">
                                    <div class="fw-bold fs-7">{{ $book->title }}</div>
                                    <div class="p-1">Ngày đăng:{{$book->created_at}} - lượt xem: {{$book->view}}</div>
                                    <div>
                                        <p style="overflow: hidden;white-space: nowrap; text-overflow: ellipsis;">
                                            {{$book->description}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
