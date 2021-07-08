@extends('../../admin')

@section('title', 'Xóa khóa học')
@section('content')
    <div class="page-title">
        <div class="d-flex justify-content-between">
            <h3>Khóa học</h3>
            <div class="d-flex align-items-center"><button type="button" class="btn btn-square btn-link mb-2"><a
                        href={{ route('course.Index') }}><span class="fa-fw select-all fas"></span> Danh sách khóa
                        học</a></button></div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Xóa khóa học</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="text-align:left">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p>Bạn Có chắc chắn muốn xóa <b>{{  $data['title']}}</b></p>
            
        </div>
        <div class="card-footer">
            <form action="" method="POST">
                @method("DELETE")
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger mb-2"><i class="fas fa-draft"></i> Delete</button>
            </form>
        </div>
    </div>
@endsection
