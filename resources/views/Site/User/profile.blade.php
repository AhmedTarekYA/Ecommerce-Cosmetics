@extends('Site.Layout.app')
@section('content')

    <!-- Start My Account Area  -->
    <div class="axil-dashboard-area axil-section-gap">
        <div class="container">
            <div class="axil-dashboard-warp">
                <div class="axil-dashboard-author">
                    <div class="media">
                        <div class="thumbnail">
                            <img id="image-of-user" src="{{getUserImage(loggedUser('image'))}}" style="width: 160px"
                                 alt="{{loggedUser('name')}}">
                        </div>
                        <div class="media-body">
                            <h5 class="title mb-0">مرحبا بـك <span class="name-of-user">{{loggedUser('name')}}</span> 👋
                            </h5>
                            <span class="joining-date">عضو  {{loggedUser('created_at')->diffForHumans()}}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-4">
                        <aside class="axil-dashboard-aside">
                            <nav class="axil-dashboard-nav">
                                <div class="nav nav-tabs" role="tablist">
                                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-orders"
                                       role="tab" aria-selected="false"><i
                                            class="fas fa-shopping-basket"></i>الطلبات</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab"
                                       aria-selected="false"><i class="fas fa-user"></i>بيانات الحساب</a>
                                    <a class="nav-item nav-link" href="{{route('logout')}}"><i
                                            class="fal fa-sign-out"></i>تسجيل الخروج</a>
                                </div>
                            </nav>
                        </aside>
                    </div>
                    <div class="col-xl-9 col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="nav-orders" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <div id="emptyOrder"
                                         class="text-center {{($orders->count()) ? 'd-none' : ''}}">
                                        <p>لا يوجد لديك اي طلبات معنا 😮, اذهب الي المتجر الان وابدأ بالشراء</p>
                                        <img src="{{asset('uploads/no-order.png')}}" style="width: 30%;height: 30%"
                                             alt=" لا يوجد طلبات">
                                    </div>
                                    <div class="table-responsive {{($orders->count()) ? '' : 'd-none'}}"
                                         id="tableOfOrder">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">رقم الطلب</th>
                                                <th scope="col">الوقت</th>
                                                <th scope="col">الحالة</th>
                                                <th scope="col">المجموع</th>
                                                <th scope="col">التفاصيل</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr id="trOfOrder{{$order->id}}">
                                                    <th scope="row">#{{$order->id}}</th>
                                                    <td>{{\Carbon\Carbon::parse($order->created_at)->format('Y/m/d h:i a')}}</td>
                                                    @if($order->status == 'new')
                                                        <td><span class='text-warning'>جديد</span></td>
                                                    @elseif($order->status == 'accepted')
                                                        <td><span class='text-primary'>مقبول</span></td>
                                                    @elseif($order->status == 'refused')
                                                        <td><span class='text-danger'>مرفوض</span></td>
                                                    @elseif($order->status == 'completed')
                                                        <td><span class='text-success'>مكتمل ✔️</span></td>
                                                    @endif
                                                    <td>{{$order->total_price}} ج.م</td>
                                                    <td>
                                                        <a href="#" class="axil-btn view-btn showBtn"
                                                           data-id="{{$order->id}}">عرض </a>
                                                        <a href="javascript:void(0)" data-id="{{$order->id}}"
                                                           class="deleteOrder axil-btn btn-danger view-btn"
                                                           style="background-color: #ec2d2d;color: white;border: #ec2d2d;">حذف</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                <div class="col-lg-9">
                                    <div class="axil-dashboard-account">
                                        <form class="account-details-form" action="{{route('updateProfile')}}"
                                              id="updateForm">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>صورة الحساب</label>
                                                        <input type="file" class="dropify" name="image"
                                                               data-default-file="{{getUserImage(loggedUser('image'))}}"
                                                               accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>الاسم</label>
                                                        <input type="text" name="name" class="form-control"
                                                               value="{{loggedUser('name')}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>الايميل</label>
                                                        <input type="email" name="email" class="form-control"
                                                               value="{{loggedUser('email')}}">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group mb--40">
                                                        <label>العنوان</label>
                                                        <input type="text" name="address" class="form-control"
                                                               value="{{loggedUser('address')}}">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h5 class="title">تغيير كلمة المرور</h5>
                                                    <div class="form-group">
                                                        <label>الكلمة الجديدة</label>
                                                        <input type="password" name="password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>تأكيد كلمة المرور </label>
                                                        <input type="password" name="password_confirmation"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group mb--0">
                                                        <button id="submitButton" type="submit"
                                                                class="axil-btn btn-bg-primary submit-btn">حفظ التغييرات
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  Large modal example -->
                    <div class="modal fade bs-example-modal-lg mainModal" id="showProductsModal"
                         data-bs-backdrop="static" data-bs-keyboard="false"
                         tabindex="-1" role="dialog" aria-labelledby="mainModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"> تفاصيل طلبي </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-bs-dismiss="modal"><a class="axil-btn view-btn">اغلاق</a> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End My Account Area  -->
@include('Admin.Layout.loader.loaderCss')
@endsection
@section('site-js')
    <script>

        $('.dropify').dropify("Upload Here");

        $(".deleteOrder").click(function () {
            var order_id = $(this).data("id");
            var url = "{{route('deleteOrder')}}";
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    "order_id": order_id
                },
                beforeSend: function () {
                    $(".loader-container").show();
                },
                success: function (data) {
                    if (data.status == 200) {
                        toastr.success("تم حذف الطلب بنجاح");
                        if (data.count == 0) {
                            $('#emptyOrder').removeClass('d-none');
                            $('#tableOfOrder').addClass('d-none');
                        }
                    } else {
                        toastr.error('عذرا هناك خطأ فني 😞');
                    }
                    $('#trOfOrder' + order_id).fadeOut('slow');
                    $(".loader-container").fadeOut("slow");
                },
            });
        });

        // update profile
        $("form#updateForm").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#updateForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#submitButton').html('<span style="margin-right: 4px;color: white"> انتظر.. </span><span class="spinner-border spinner-border-sm text-light" ' + ' ></span>');
                },
                success: function (data) {
                    if (data.status == 200) {
                        toastr.success(data.message);
                        $('.name-of-user').text(data.name);
                        $('#image-of-user').attr("src", data.image);
                        $('.image-profile-nav').attr("src", data.image);
                        $('#submitButton').html("حفظ التغييرات").attr('disabled', false);
                    } else {
                        toastr.error('عذرا هناك خطأ فني 😞');
                    }
                },
                error: function (data) {
                    if (data.status == 500) {
                        $('#submitButton').html("حفظ التغييرات").attr('disabled', false);
                        toastr.error('عذرا هناك خطأ فني 😞');
                    } else if (data.status == 422) {
                        $('#submitButton').html("حفظ التغييرات").attr('disabled', false);
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value);
                                });
                            }
                        });
                    }
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });

        var loader = `<div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>`;

        $(document).on('click', '.showBtn', function () {
            var url = '{{ route("showProducts",":id") }}',
                id = $(this).data('id');
            url = url.replace(':id', id);
            $('#modal-body').html(loader)
            $('#showProductsModal').modal('show')
            setTimeout(function () {
                $('#modal-body').load(url)
            }, 500)
        });
    </script>
@endsection
