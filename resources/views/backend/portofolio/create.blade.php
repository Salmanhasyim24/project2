@extends('admin.dashboard')
@section('title', 'Create Portofolio')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Portofolio </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Portofolio Name</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-body">

                                <form id="myForm" method="post" action="{{ route('store.portofolio') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="name" class="form-label">Name</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="name" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="title" class="form-label">Title</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="title" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="description" class="form-label">Description</label>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea id="mytextarea" name="description">Description</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="image" class="form-label">Image</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="image" class="form-control" id="image" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Admin"
                                                style="width:100px; height: 100px;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    title: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Portofolio Title',
                    },
                    title: {
                        required: 'Please Enter Portofolio Title',
                    },
                    description: {
                        required: 'Please Enter Short Title',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>




    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
