@extends('admin.dashboard')
@section('title', 'Edit Portofolio Menu')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Portofolio</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Portofolio</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Portofolio</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('update.portofolio', $portofolio->id) }}">
                    @csrf

                    <input type="hidden" name="id" value="{{ $portofolio->id }}">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">


                                    <div class="form-group mb-3">
                                        <label for="inputProductTitle" class="form-label">Product Title</label>
                                        <input type="text" name="title" class="form-control" id="inputProductTitle"
                                            value="{{ $portofolio->title }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="inputProductTitle" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ $portofolio->name }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductDescription" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" id="inputProductDescription" rows="3">
                                    {{ $portofolio->description }}
			                        	</textarea>
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


    <!-- /// Main Image Thambnail Update ////// -->

    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Update Main Image Thambnail </h6>
        <hr>
        <div class="card">
            <form method="post" action="{{ route('update.portofolio.thumbnail', $portofolio->id) }}"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $portofolio->id }}">
                <input type="hidden" name="old_img" value="{{ $portofolio->image }}">

                <div class="card-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Chose Thambnail Image </label>
                        <input name="image" class="form-control" type="file" id="formFile">
                    </div>


                    <div class="mb-3">
                        <label for="formFile" class="form-label"> </label>
                        <img src="{{ asset($portofolio->image) }}" style="width:100px; height:100px">
                    </div>

                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />

                </div>

            </form>

        </div>
    </div>


    <!-- /// End Main Image Thambnail Update ////// -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    thumbnail: {
                        required: true,
                    },
                    multi_img: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                    code: {
                        required: true,
                    },
                    qty: {
                        required: true,
                    },
                    brand_id: {
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
                    name: {
                        required: 'Please Enter Product Name',
                    },
                    description: {
                        required: 'Please Enter Short Description',
                    },
                    thumbnail: {
                        required: 'Please Select Product Thambnail Image',
                    },
                    multi_img: {
                        required: 'Please Select Product Multi Image',
                    },
                    price: {
                        required: 'Please Enter Selling Price',
                    },
                    code: {
                        required: 'Please Enter Product Code',
                    },
                    qty: {
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



@endsection
