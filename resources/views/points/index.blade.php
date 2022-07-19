@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Danh sách Điểm Review Sách</span>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tên người dùng</th>
                                <th>Tên Sách</th>
                                <th>Điểm</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($points as $point)
                                <tr>
                                    <td>{{$point->user->name}}</td>
                                    <td>{{$point->book->title}}</td>
                                    <td>{{$point->point}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$points->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

