@extends('admin.dashboard')
@section('title', 'Create HomeSlide')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Update New HomeSlide</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update New HomeSlide</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Update New HomeSlide</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('update.slider', $homeslide->id) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $homeslide->id }}">
                    <input type="hidden" name="image" value="{{ $homeslide->image }}">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12 col-6">
                                <div class="border border-3 p-4 rounded">

                                    <div class="form-group mb-3">
                                        <label for="title" class="form-label">title</label>
                                        <input type="text" name="title" value="{{ $homeslide->title }}"
                                            class="form-control" id="title" placeholder="Enter title">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductDescription" class="form-label">Short Title</label>
                                        <textarea id="mytextarea" name="short_title"> {!! $homeslide->short_title !!}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductDescription" class="form-label">Code For Video</label>
                                        <textarea name="video_url" class="form-control" id="inputProductDescription" rows="3">{!! $homeslide->video_url !!}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductTitle" class="form-label">Main Thumbanil</label>
                                        <input name="image" class="form-control" type="file" id="formFile"
                                            onChange="mainThamUrl(this)">
                                        <div class="mx-2 my-2 gap-2">
                                            <img src="" id="mainThmb" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-secondary mb-3">
                                        <img id="showImage"
                                            src="{{ !empty($homeslide->image) ? asset($homeslide->image) : url('upload/no_image.jpg') }}"
                                            alt="Admin" style="width:100px; height: 100px;">
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />

                                        </div>
                                    </div>

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
                    short_title: {
                        required: true,
                    },

                },
                messages: {
                    title: {
                        required: 'Please Enter Product Name',
                    },
                    short_title: {
                        required: 'Please Enter Short Description',
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
