@extends('admin.dashboard')
@section('title', 'Create Footer')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Update New Footer</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update New Footer</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Update New Footer</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('update.footer', $allfooter->id) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $allfooter->id }}">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12 col-6">
                                <div class="border border-3 p-4 rounded">

                                    <div class="form-group mb-3">
                                        <label for="number" class="form-label">number</label>
                                        <input type="text" name="number" value="{{ $allfooter->number }}"
                                            class="form-control" id="number" placeholder="Enter number">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">email</label>
                                        <input type="text" name="email" value="{{ $allfooter->email }}"
                                            class="form-control" id="email" placeholder="Enter email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="facebook" class="form-label">facebook</label>
                                        <input type="text" name="facebook" value="{{ $allfooter->facebook }}"
                                            class="form-control" id="facebook" placeholder="Enter facebook">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="instagram" class="form-label">instagram</label>
                                        <input type="text" name="instagram" value="{{ $allfooter->instagram }}"
                                            class="form-control" id="instagram" placeholder="Enter instagram">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="twitter" class="form-label">twitter</label>
                                        <input type="text" name="twitter" value="{{ $allfooter->twitter }}"
                                            class="form-control" id="twitter" placeholder="Enter twitter">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="copyright" class="form-label">copyright</label>
                                        <input type="text" name="copyright" value="{{ $allfooter->copyright }}"
                                            class="form-control" id="copyright" placeholder="Enter copyright">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductDescription" class="form-label">Short Description</label>
                                        <textarea id="mytextarea" name="short_description"> {!! $allfooter->short_description !!}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductDescription" class="form-label">Address</label>
                                        <textarea name="adress" class="form-control" id="inputProductDescription" rows="3">{!! $allfooter->adress !!}</textarea>
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


@endsection
