@extends('../../admin')

@section('title', 'Danh sách khóa học')
@section('content')
    <div class="page-title">
        <div class="d-flex justify-content-between">
            <h3>Khóa học</h3>
            <div class="d-flex align-items-center"><button class="btn btn-primary"><a href={{ route('course.Create') }}>Tạo khóa học</a></button></div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Danh sách khóa học</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="30%">Title</th>
                            <th width="40%">Description</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{$item['id']}}</th>
                                <td>
                                    <h6><a href={{ route('course.Show', ['id'=>$item['id']]) }}>{{$item['title']}}</a></h6>
                                    <div><small>Created At: {{$item['created_at']}}</small></div>
                                    <div><small>Updated At: {{$item['updated_at']}}</small></div>
                                </td>
                                <td>{{$item['description']}}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-secondary mb-2"><a href={{ route('course.Edit', ['id'=>$item['id']]) }}>Edit</a></button>
                                    <button type="button" class="btn btn-sm btn-outline-danger mb-2"><a href={{ route('course.Delete', ['id'=>$item['id']]) }}>Delete</a></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (count($data) === 0)
                    <div> Mục này chưa có dữ liệu </div>
                @endif
            </div>
            {{ $data->links() }}
        </div>
    </div>
@endsection
