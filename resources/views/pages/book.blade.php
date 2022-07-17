@extends('pages.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <nav aria-label="breadcrumb" class="mx-3 mt-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">book-review</li>
                        </ol>
                    </nav>
                    <div class="card-header fw-bold fs-5">
                        {{ $book->title }}
                    </div>

                    <div class="card-header fw-bold fs-5">
                        Tác giả : {{ $book->author }}
                    </div>

                    <div class="card-body">
                       <div class="view mt-1">
                           Tổng số lượt xem : {{$book->view}}
                       </div>
                        <div class="date mt-1">
                            Ngày Review : {{ $book->created_at }}
                        </div>
                        <div class="mt-3">
                            @if ($book->image)
                                <img style="display: block; margin-left: auto; margin-right: auto;"
                                     class="img-thumbnail" src="{{ asset($book->image) }}" />
                            @endif
                        </div>
                        <div class="content mt-3">
                            <p class="fs-5">
                                {{ $book->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Điểm bài đánh giá sách</div>
                    <div class="card-body">
                        <div class="fw-bold mb-3">
                            {{ $pointAvg == 0 ? 'chưa có điểm đánh giá trung bình' : $pointAvg }}
                        </div>
                        <div>
                            @if(Auth::user())
                            <form class="row g-3" action="{{ route('point') }}" method="post">
                                @csrf
                                <div class="col-auto">
                                    <label for="inputPassword2" class="visually-hidden">bình luận</label>
                                    <input type="number" name="point" class="form-control" id="inputPassword2" placeholder="chấm điểm">
                                </div>
                                <input type="hidden" name="book_id" value="{{$book->id}}" class="form-control" id="inputPassword2" placeholder="bình luận">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">gửi</button>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Bình luận
                    </div>
                    <div class="card-body">
                        @foreach($comments as $comment)
                            <div class="fw-bold">
                                {{ $comment->user->name }}
                            </div>
                            <div>
                                {{ $comment->content }}
                            </div>
                        @endforeach
                        @if(Auth::user())
                            <div>
                                <form class="row g-3" action="{{ route('comment') }}" method="post">
                                    @csrf
                                    <div class="col-auto">
                                        <label for="inputPassword2" class="visually-hidden">bình luận</label>
                                        <input type="text" name="comment" class="form-control" id="inputPassword2" placeholder="bình luận">
                                    </div>
                                    <input type="hidden" name="book_id" value="{{$book->id}}" class="form-control" id="inputPassword2" placeholder="bình luận">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mb-3">gửi</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
