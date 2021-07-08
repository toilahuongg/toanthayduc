@extends('../../admin')

@section('title', 'Tạo khóa học')
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
        <div class="card-header">Tạo khóa học</div>
        <div class="card-body">
            @if (session('data'))
                <div class="alert alert-success">
                    Đã tạo thành công khóa học "{{ session('data')->title }}"
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
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter...">
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Khóa học</label>
                    <select name="parent" class="form-control">
                        <option value="0">Khóa học</option>
                        {!! $htmlOption !!}
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter..." rows="5"> </textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-save"></i> Create</button>
            </form>
        </div>
    </div>
@endsection
