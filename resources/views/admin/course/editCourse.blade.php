@extends('../../admin')

@section('title', 'Sửa khóa học')
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
        <div class="card-header">Sửa khóa học</div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    Chỉnh sửa thành công
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="text-align:left">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="" method="POST">
                @method("PUT")
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter..." value="{{ $data['title'] }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter..." rows="5"> {{ $data['description'] }} </textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-save"></i> Update</button>
            </form>
        </div>
    </div>
@endsection
