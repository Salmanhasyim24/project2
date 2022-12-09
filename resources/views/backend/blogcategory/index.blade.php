@extends('admin.dashboard')
@section('title')
    Blog Menu
@endsection
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Blog</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.blog') }}" class="btn btn-primary">Create Blog</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Title </th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <a href="{{ route('edit.blog', $item->id) }}" class="btn btn-info"
                                            title="Edit Data">
                                            <i class="fa fa-pencil"></i> </a>

                                        <a href="{{ route('delete.blog', $item->id) }}" class="btn btn-danger"
                                            id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Title </th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
