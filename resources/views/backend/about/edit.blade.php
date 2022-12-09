@extends('admin.dashboard')
@section('title', 'Edit Product Menu')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Product</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('update.about', $abouts->id) }}">
                    @csrf

                    <input type="hidden" name="id" value="{{ $abouts->id }}">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">


                                    <div class="form-group mb-3">
                                        <label for="inputProductTitle" class="form-label">Product Title</label>
                                        <input type="text" name="title" class="form-control" id="inputProductTitle"
                                            value="{{ $abouts->title }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="inputProductTitle" class="form-label">Product Short Title</label>
                                        <input type="text" name="short_title" class="form-control" id="short_title"
                                            value="{{ $abouts->short_title }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductDescription" class="form-label">Short Description</label>
                                        <textarea name="short_description" class="form-control" id="inputProductDescription" rows="3">
                                    {{ $abouts->short_description }}
			                        	</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Long Description</label>
                                        <textarea id="mytextarea" name="long_description">
				                     {!! $abouts->long_description !!}</textarea>
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
            <form method="post" action="{{ route('update.about.thumbnail', $abouts->id) }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $abouts->id }}">
                <input type="hidden" name="old_img" value="{{ $abouts->thumbnail }}">

                <div class="card-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Chose Thambnail Image </label>
                        <input name="thumbnail" class="form-control" type="file" id="formFile">
                    </div>


                    <div class="mb-3">
                        <label for="formFile" class="form-label"> </label>
                        <img src="{{ asset($abouts->thumbnail) }}" style="width:100px; height:100px">
                    </div>

                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />

                </div>

            </form>

        </div>
    </div>


    <!-- /// End Main Image Thambnail Update ////// -->

    <!-- /// Update Multi Image  ////// -->

    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Update Multi Image </h6>
        <hr>
        <div class="card">
            <div class="card-body">
                <table class="table mb-0 table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#Sl</th>
                            <th scope="col">Image</th>
                            <th scope="col">Change Image </th>
                            <th scope="col">Delete </th>
                        </tr>
                    </thead>
                    <tbody>

                        <form method="post" action="{{ route('update.about.multiimage') }}" enctype="multipart/form-data">
                            @csrf

                            @foreach ($multiImgs as $key => $img)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td> <img src="{{ asset($img->multi_img) }}" style="width:70; height: 40px;"> </td>
                                    <td> <input type="file" class="form-group" name="multi_img[{{ $img->id }}]">
                                    </td>
                                    <td>
                                        <input type="submit" class="btn btn-primary px-4" value="Update Image " />
                                        <a href="{{ route('about.multiimg.delete', $img->id) }}" class="btn btn-danger"
                                            id="delete"> Delete </a>
                                    </td>
                                </tr>
                            @endforeach

                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- /// End Update Multi Image  ////// -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    short_title: {
                        required: true,
                    },
                    thumbnail: {
                        required: true,
                    },
                    multi_img: {
                        required: true,
                    },
                    long_description: {
                        required: true,
                    },
                    short_description: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Product Name',
                    },
                    short_description: {
                        required: 'Please Enter Short Description',
                    },
                    title: {
                        required: 'Please Select Product Thambnail Image',
                    },
                    multi_img: {
                        required: 'Please Select Product Multi Image',
                    },
                    short_title: {
                        required: 'Please Enter Selling Price',
                    },
                    long_description: {
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


    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element 
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>



    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .name + '</option>');
                            });
                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#js-example-basic-single').select2();
        });
    </script>
@endsection
