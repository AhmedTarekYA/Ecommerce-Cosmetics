@extends('Admin.Layout.app')
@section('title')
    تفاصيل المنتج
@endsection
@section('pageName')
    تفاصيل المنتج
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="product-detai-imgs">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-4">
                                        <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
                                             aria-orientation="vertical">
                                            <a class="nav-link active" id="product-{{$product->id}}-tab"
                                               data-bs-toggle="pill" href="#product-{{$product->id}}" role="tab"
                                               aria-controls="product-1" aria-selected="true">
                                                <img src="{{getFile($product->image)}}" alt=""
                                                     class="img-fluid mx-auto d-block rounded">
                                            </a>
                                            @foreach($product->images as $rowImage)
                                                <a class="nav-link" id="product-{{$rowImage->id}}-tab"
                                                   data-bs-toggle="pill" href="#product-{{$rowImage->id}}" role="tab"
                                                   aria-controls="product-2" aria-selected="false">
                                                    <img src="{{getFile($rowImage->image)}}" alt=""
                                                         class="img-fluid mx-auto d-block rounded">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="product-{{$product->id}}"
                                                 role="tabpanel" aria-labelledby="product-{{$product->id}}-tab">
                                                <div>
                                                    <img src="{{getFile($product->image)}}" alt=""
                                                         class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                            @foreach($product->images as $rowImage)
                                                <div class="tab-pane fade" id="product-{{$rowImage->id}}"
                                                     role="tabpanel" aria-labelledby="product-{{$rowImage->id}}-tab">
                                                    <div>
                                                        <img src="{{getFile($rowImage->image)}}" alt=""
                                                             class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="text-center">
                                            {{--                                            <button type="button"--}}
                                            {{--                                                    class="btn btn-primary waves-effect waves-light mt-2 me-1">--}}
                                            {{--                                                <i class="bx bx-cart me-2"></i> Add to cart--}}
                                            {{--                                            </button>--}}
                                            {{--                                            <button type="button"--}}
                                            {{--                                                    class="btn btn-success waves-effect  mt-2 waves-light">--}}
                                            {{--                                                <i class="bx bx-shopping-bag me-2"></i>Buy now--}}
                                            {{--                                            </button>--}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mt-4 mt-xl-3">
                                {{--                                <a href="javascript: void(0);" class="text-primary">Headphone</a>--}}
                                <h4 class="mt-1 mb-3">{{$product->title}}</h4>

                                <p class="text-muted float-start me-3">
                                    @for ($i = 1; $i <= $product->stars; $i++)
                                        <i class='bx bxs-star text-warning'></i>
                                    @endfor
                                    @for ($i = 5; $i > $product->stars; $i--)
                                        <i class='bx bx-star text-warning'></i>
                                    @endfor
                                </p>
                                <p class="text-muted mb-4">( {{$product->reviews_num}} مراجعات )</p>

                                @if($product->price_after && $product->price_after != 0)
                                        <?php
                                        $discountPercent = (($product->price_before - $product->price_after) / $product->price_before) * 100;
                                        ?>
                                    <h6 class="text-success text-uppercase">خصم {{round($discountPercent,0)}} % </h6>
                                @endif
                                <h5 class="mb-4">السعر :
                                    @if($product->price_after && $product->price_after != 0)
                                        <span class="text-muted me-2"><del>{{$product->price_before}} ج م</del></span>
                                        <b>{{$product->price_after}} ج م</b></h5>
                                @else
                                    <b>{{$product->price_before}} ج م</b>
                                @endif
                                <p class="text-muted mb-4">
                                    {{$product->desc}}
                                </p>
                                {{--                                <div class="row mb-3">--}}
                                {{--                                    <div class="col-md-6">--}}
                                {{--                                        <div>--}}
                                {{--                                            <p class="text-muted"><i--}}
                                {{--                                                    class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>--}}
                                {{--                                                Wireless</p>--}}
                                {{--                                            <p class="text-muted"><i--}}
                                {{--                                                    class="bx bx-shape-triangle font-size-16 align-middle text-primary me-1"></i>--}}
                                {{--                                                Wireless Range : 10m</p>--}}
                                {{--                                            <p class="text-muted"><i--}}
                                {{--                                                    class="bx bx-battery font-size-16 align-middle text-primary me-1"></i>--}}
                                {{--                                                Battery life : 6hrs</p>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col-md-6">--}}
                                {{--                                        <div>--}}
                                {{--                                            <p class="text-muted"><i--}}
                                {{--                                                    class="bx bx-user-voice font-size-16 align-middle text-primary me-1"></i>--}}
                                {{--                                                Bass</p>--}}
                                {{--                                            <p class="text-muted"><i--}}
                                {{--                                                    class="bx bx-cog font-size-16 align-middle text-primary me-1"></i>--}}
                                {{--                                                Warranty : 1 Year</p>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                <div class="product-color">
                                    <h5 class="font-size-15">صور المنتج</h5>
                                    <a href="javascript: void(0);" class="active">
                                        <div class="product-color-item border rounded">
                                            <img src="{{getFile($product->image)}}" onclick="window.open(this.src)"
                                                 alt="" class="avatar-md">
                                        </div>
                                        <p>الصورة الرئيسية</p>
                                    </a>
                                    @foreach($product->images as $rowImage)
                                        <a href="javascript: void(0);" id="productImage{{$rowImage->id}}">
                                            <div class="product-color-item border rounded">
                                                <img src="{{getFile($rowImage->image)}}" onclick="window.open(this.src)"
                                                     alt="" class="avatar-md">
                                            </div>
                                            <button class="btn btn-danger deleteBtn" data-id="{{$rowImage->id}}">حذف
                                            </button>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    {{--                    <div class="mt-5">--}}
                    {{--                        <h5 class="mb-3">Specifications :</h5>--}}

                    {{--                        <div class="table-responsive">--}}
                    {{--                            <table class="table mb-0 table-bordered">--}}
                    {{--                                <tbody>--}}
                    {{--                                <tr>--}}
                    {{--                                    <th scope="row" style="width: 400px;">Category</th>--}}
                    {{--                                    <td>Headphone</td>--}}
                    {{--                                </tr>--}}
                    {{--                                <tr>--}}
                    {{--                                    <th scope="row">Brand</th>--}}
                    {{--                                    <td>JBL</td>--}}
                    {{--                                </tr>--}}
                    {{--                                <tr>--}}
                    {{--                                    <th scope="row">Color</th>--}}
                    {{--                                    <td>Black</td>--}}
                    {{--                                </tr>--}}
                    {{--                                <tr>--}}
                    {{--                                    <th scope="row">Connectivity</th>--}}
                    {{--                                    <td>Bluetooth</td>--}}
                    {{--                                </tr>--}}
                    {{--                                <tr>--}}
                    {{--                                    <th scope="row">Warranty Summary</th>--}}
                    {{--                                    <td>1 Year</td>--}}
                    {{--                                </tr>--}}
                    {{--                                </tbody>--}}
                    {{--                            </table>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <!-- end Specifications -->

                    <div class="mt-5">
                        <div class="row">
                            <div class="col-9">
                                <h5>المراجعات والتعليقات :</h5>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-success btn-lg" data-bs-toggle="modal"
                                        data-bs-target="#addModal">اضافة تعليق
                                </button>
                            </div>
                        </div>
                        @foreach($product->reviews as $rev)
                            <div class="d-flex py-3 border-bottom" id="comment-{{$rev->id}}">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{getUserImage($rev->image)}}" class="avatar-xs rounded-circle"
                                         alt="img"/>
                                </div>

                                <div class="flex-grow-1">
                                    <h5 class="mb-1 font-size-15">{{$rev->name}}
                                        @for ($i = 1; $i <= $rev->stars; $i++)
                                            <i class='bx bxs-star text-warning'></i>
                                        @endfor
                                        @for ($i = 5; $i > $rev->stars; $i--)
                                            <i class='bx bx-star text-warning'></i>
                                        @endfor
                                    </h5>
                                    <p class="text-muted">
                                        {{$rev->desc}}
                                    </p>
                                    <ul class="list-inline float-sm-end mb-sm-0">
                                        <li class="list-inline-item">
                                            <button class="btn deleteCommentBtn" data-id="{{$rev->id}}"><i
                                                    class="fa fa-trash me-1 text-danger"></i></button>
                                        </li>
                                    </ul>
                                    <div class="text-muted font-size-12"><i
                                            class="far fa-calendar-alt text-primary me-1"></i> {{$rev->created_at->diffForHumans()}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><span id="operationType"></span> اضافة تعليق </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <form action="{{route('addComment')}}" id="addForm" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body" id="modal-body">
                                    <div class="mb-3 h-25">
                                        <label class="form-label">الصورة</label>
                                        <input type="file" class="dropify" name="image"
                                               data-default-file="{{getUserImage()}}"
                                               accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
                                        <span class="form-text text-info">مسموح فقط بالصيغ الاتية : png, gif, jpeg, jpg, webp</span>
                                    </div>
                                    <input type="hidden" name="product_id" class="form-control"
                                           value="{{$product->id}}">
                                    <div class="mb-3">
                                        <label class="form-label">الاسم</label>
                                        <input type="text" name="name" class="form-control" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">التعليق</label>
                                        <input type="text" name="desc" class="form-control" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">عدد النجوم</label>
                                        <input type="number" min="1" max="5" name="stars" value="5"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="addButton">اضافة</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->

@endsection
@section('dashboard-js')
    <script>

        $('.dropify').dropify("Upload Here");

        $(document).on('click', '.deleteBtn', function () {
            var id = $(this).data('id');
            swal.fire({
                title: "حذف صورة",
                text: "هل انت متأكد من حذف صورة المنتج ؟",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc5339",
                confirmButtonText: "نعم, احذف !",
                cancelButtonText: "تراجع",
                okButtonText: "اضافة",
                closeOnConfirm: false
            }).then((result) => {
                if (!result.isConfirmed) {
                    return true;
                }
                var url = '{{ route("products.deleteImage",":id") }}';
                url = url.replace(':id', id)
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    beforeSend: function () {
                        $('#loader-overlay').show()
                    },
                    success: function (data) {

                        window.setTimeout(function () {
                            $('#loader-overlay').hide()
                            if (data.status == 200) {
                                toastr.success((data.message) ?? 'تم حذف البيانات بنجاح')
                                $(`#productImage${data.id}`).fadeOut();
                                $(`#product-${data.id}`).fadeOut();
                                $(`#product-${data.id}-tab`).fadeOut();
                            } else if (data.status == 405) {
                                toastr.warning('يجب ان تكون هناك صورة واحدة علي الاقل للمنتج !');
                            } else
                                toastr.error('عذرا هناك خطأ فني 😞');
                        }, 300);
                    }, error: function (data) {

                        if (data.status === 500) {
                            toastr.error('عذرا هناك خطأ فني 😞');
                        }
                        if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors, function (key, value) {
                                if ($.isPlainObject(value)) {
                                    $.each(value, function (key, value) {
                                        toastr.error(value)
                                    });
                                }
                            });
                        }
                    }

                });
            });
        });

        $(document).on('click', '.deleteCommentBtn', function () {
            var id = $(this).data('id');
            swal.fire({
                title: "حذف تعليق",
                text: "هل انت متأكد من حذف هذا التعليق ؟",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc5339",
                confirmButtonText: "نعم, احذف !",
                cancelButtonText: "تراجع",
                okButtonText: "اضافة",
                closeOnConfirm: false
            }).then((result) => {
                if (!result.isConfirmed) {
                    return true;
                }
                var url = '{{ route("products.deleteComment",":id") }}';
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: 'DELETE',
                beforeSend: function () {
                    $('#loader-overlay').show()
                },
                success: function (data) {

                    window.setTimeout(function () {
                        $('#loader-overlay').hide()
                        if (data.status == 200) {
                            toastr.success((data.message) ?? 'تم حذف البيانات بنجاح')
                            $(`#comment-${data.id}`).removeClass('d-flex py-3 border-bottom').fadeOut();
                        }
                        else
                            toastr.error('عذرا هناك خطأ فني 😞');
                    }, 300);
                }, error: function (data) {

                    if (data.status === 500) {
                        toastr.error('عذرا هناك خطأ فني 😞');
                    }
                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value)
                                });
                            }
                        });
                    }
                }

            });
        });
    });


    $(document).on('submit', 'Form#addForm', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#addForm').attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#addButton').html('<span style="margin-right: 4px;">انتظر ..</span><i class="bx bx-loader bx-spin"></i>');
            },
            success: function (data) {
                if (data.status == 200) {
                    window.location.reload();
                    // show custom message or use the default
                    toastr.success((data.message) ?? 'تم اضافة البيانات بنجاح');
                } else
                    toastr.error('عذرا هناك خطأ فني 😞');
                $('#addButton').html(`اضافة`).attr('disabled', false);
                $('#editOrCreate').modal('hide')
            },
            error: function (data) {
                if (data.status === 500) {
                    toastr.error('عذرا هناك خطأ فني 😞');
                } else if (data.status === 422) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value);
                            });
                        }
                    });
                } else
                    toastr.error('عذرا هناك خطأ فني 😞');
                $('#addButton').html(`اضافة`).attr('disabled', false);
            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });

</script>

@endsection


