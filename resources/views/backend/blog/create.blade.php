@extends('admin.dashboard')
@section('title', 'Create Post')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add New Post</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Post</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Post</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('store.blog') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">

                                    <div class="form-group mb-3">
                                        <label for="title" class="form-label">Post Title ENG</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Enter product title">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="blog_category_id" class="form-label">Blog Category</label>
                                        <select name="blog_category_id" class="form-select" id="js-example-basic-single">
                                            <option></option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="tags" class="form-label">Tags For Blog</label>
                                        <input type="text" id="tags" name="tags"
                                            class="form-control visually-hidden" data-role="tagsinput"
                                            value="recommended..">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductDescription" class="form-label">Details For Eng</label>
                                        <textarea id="mytextarea" name="description">Hello, World!</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductTitle" class="form-label">Main Thumbanil</label>
                                        <input name="image" class="form-control" type="file" id="formFile"
                                            onChange="mainThamUrl(this)">
                                        <div class="my-2 gap-2">
                                            <img src="" id="mainThmb" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />

                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
            </div>

            </form>

        </div>

    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    title_idn: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },
                    tags: {
                        required: true,
                    },
                    tags_idn: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    details_idn: {
                        required: true,
                    },
                    district_id: {
                        required: true,
                    },
                    subdistrict_id: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                    subcategory_id: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: 'Please Enter Product Name',
                    },
                    title_idn: {
                        required: 'Please Enter Short Description',
                    },
                    image: {
                        required: 'Please Select Product Thambnail Image',
                    },
                    tags: {
                        required: 'Please Select Product Multi Image',
                    },
                    tags_idn: {
                        required: 'Please Enter Selling Price',
                    },
                    description: {
                        required: 'Please Enter Product Code',
                    },
                    details_idn: {
                        required: 'Please Enter Product Quantity',
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
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <!--
                                                                                                                                                                                             This is for Category  -->

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#js-example-basic-single').select2();
        });
    </script>
@endsection
