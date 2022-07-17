@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sách review mới thêm </div>

                <div class="card-body">
                    @foreach($books as $book)
                        <div class="row mt-1">
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
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Sách review có lượt xem nhiều</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                        @foreach($bookViews as $book)
                            <tr>
                                <td class="col-8 fw-bold">{{$book->title}}</td>
                                <td class="col-4">{{$book->view}} lượt xem</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header">Sách review điểm mới nhất</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                        @foreach($points as $point)
                            <tr>
                                <td class="col-8 fw-bold">{{$point->book->title}}</td>
                                <td class="col-4">điểm : {{$point->point}}</td>
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
