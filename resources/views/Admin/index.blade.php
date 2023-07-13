@extends('Admin.Layout.app')
@section('title')
    الرئيسية
@endsection
@section('content')
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-primary">اهلا بك</h5>
                                            <p>{{($setting->title) ?? 'لوحة التحكم'}}</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{asset('assets/admin')}}/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <img src="{{getUserImage(loggedAdmin('image'))}}" alt="" class="img-thumbnail rounded-circle">
                                        </div>
                                        <h5 class="font-size-15 text-truncate">{{loggedAdmin('name')}}</h5>
{{--                                        <p class="text-muted mb-0 text-truncate">{{\Illuminate\Support\Carbon::parse(loggedAdmin('created_at'))->diffForHumans()}}</p>--}}
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="pt-4">

                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="font-size-15">{{\App\Models\Blog::where('admin_id',loggedAdmin('id'))->count()}}</h5>
                                                    <p class="text-muted mb-0">مقالاتي</p>
                                                </div>
                                            </div>
{{--                                            <div class="mt-4">--}}
{{--                                                <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($setting->order_type == 'site')
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-start">
                                        <h5 class="card-title mb-3 me-2">أرباح الشهر الحالي والماضي</h5>

                                        <div class="dropdown ms-auto">
                                            <a class="text-muted font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{route('orders.index')}}">عرض الكل</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-wrap">
                                        <div>
                                            <p class="text-muted mb-1">تم اكتمال عدد  {{$monthComplectedOrdersCount}} طلب هذا الشهر </p>
                                            <h4 class="mb-3">نسبة الارباح بين الشهرين</h4>
                                            @if($percentageChange > 0)
                                                <p class="text-success mb-0"><span> زيادة هذا الشهر بمقدار {{$percentageChange}} % <i class="mdi mdi-arrow-top-right ms-1"></i></span></p>
                                            @elseif($percentageChange < 0)
                                                <p class="text-danger mb-0"><span> نقص هذا الشهر بمقدار {{$percentageChange}} % <i class="mdi mdi-arrow-bottom-left ms-1"></i></span></p>
                                            @else
                                                <p class="text-info mb-0"><span>كلا من الشهرين كانت المبيعات {{$currentMonthSalePrice}}  ج.م </span></p>
                                            @endif
                                        </div>
                                        <div class="ms-auto align-self-end">
                                            <i class="bx bx-money display-4 text-light"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($setting->order_type == 'site')
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">طلبات الشهر الجديدة</p>
                                                <h4 class="mb-0">{{$monthNewOrdersCount}}</h4>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">اجمالي العملاء</p>
                                                <h4 class="mb-0">{{$usersCount }}</h4>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center ">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">طلبات التواصل</p>
                                                <h4 class="mb-0">{{\App\Models\ContactUs::count()}}</h4>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-message font-size-24"></i>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">الطلبات</h4>
                                <div id="column_chart" data-colors='["--bs-success","--bs-primary", "--bs-danger"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>

                    </div>
                    @endif
                </div>
                <!-- end row -->


{{--                <div class="row">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <h4 class="card-title mb-4">Latest Transaction</h4>--}}
{{--                                <div class="table-responsive">--}}
{{--                                    <table class="table align-middle table-nowrap mb-0">--}}
{{--                                        <thead class="table-light">--}}
{{--                                        <tr>--}}
{{--                                            <th style="width: 20px;">--}}
{{--                                                <div class="form-check font-size-16 align-middle">--}}
{{--                                                    <input class="form-check-input" type="checkbox" id="transactionCheck01">--}}
{{--                                                    <label class="form-check-label" for="transactionCheck01"></label>--}}
{{--                                                </div>--}}
{{--                                            </th>--}}
{{--                                            <th class="align-middle">Order ID</th>--}}
{{--                                            <th class="align-middle">Billing Name</th>--}}
{{--                                            <th class="align-middle">Date</th>--}}
{{--                                            <th class="align-middle">Total</th>--}}
{{--                                            <th class="align-middle">Payment Status</th>--}}
{{--                                            <th class="align-middle">Payment Method</th>--}}
{{--                                            <th class="align-middle">View Details</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                <div class="form-check font-size-16">--}}
{{--                                                    <input class="form-check-input" type="checkbox" id="transactionCheck02">--}}
{{--                                                    <label class="form-check-label" for="transactionCheck02"></label>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>--}}
{{--                                            <td>Neal Matthews</td>--}}
{{--                                            <td>--}}
{{--                                                07 Oct, 2019--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                $400--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <i class="fab fa-cc-mastercard me-1"></i> Mastercard--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <!-- Button trigger modal -->--}}
{{--                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">--}}
{{--                                                    View Details--}}
{{--                                                </button>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}

{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                <div class="form-check font-size-16">--}}
{{--                                                    <input class="form-check-input" type="checkbox" id="transactionCheck03">--}}
{{--                                                    <label class="form-check-label" for="transactionCheck03"></label>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2541</a> </td>--}}
{{--                                            <td>Jamal Burnett</td>--}}
{{--                                            <td>--}}
{{--                                                07 Oct, 2019--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                $380--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-pill badge-soft-danger font-size-11">Chargeback</span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <i class="fab fa-cc-visa me-1"></i> Visa--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <!-- Button trigger modal -->--}}
{{--                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">--}}
{{--                                                    View Details--}}
{{--                                                </button>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}

{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                <div class="form-check font-size-16">--}}
{{--                                                    <input class="form-check-input" type="checkbox" id="transactionCheck04">--}}
{{--                                                    <label class="form-check-label" for="transactionCheck04"></label>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2542</a> </td>--}}
{{--                                            <td>Juan Mitchell</td>--}}
{{--                                            <td>--}}
{{--                                                06 Oct, 2019--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                $384--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <i class="fab fa-cc-paypal me-1"></i> Paypal--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <!-- Button trigger modal -->--}}
{{--                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">--}}
{{--                                                    View Details--}}
{{--                                                </button>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                <div class="form-check font-size-16">--}}
{{--                                                    <input class="form-check-input" type="checkbox" id="transactionCheck05">--}}
{{--                                                    <label class="form-check-label" for="transactionCheck05"></label>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2543</a> </td>--}}
{{--                                            <td>Barry Dick</td>--}}
{{--                                            <td>--}}
{{--                                                05 Oct, 2019--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                $412--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <i class="fab fa-cc-mastercard me-1"></i> Mastercard--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <!-- Button trigger modal -->--}}
{{--                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">--}}
{{--                                                    View Details--}}
{{--                                                </button>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                <div class="form-check font-size-16">--}}
{{--                                                    <input class="form-check-input" type="checkbox" id="transactionCheck06">--}}
{{--                                                    <label class="form-check-label" for="transactionCheck06"></label>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2544</a> </td>--}}
{{--                                            <td>Ronald Taylor</td>--}}
{{--                                            <td>--}}
{{--                                                04 Oct, 2019--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                $404--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-pill badge-soft-warning font-size-11">Refund</span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <i class="fab fa-cc-visa me-1"></i> Visa--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <!-- Button trigger modal -->--}}
{{--                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">--}}
{{--                                                    View Details--}}
{{--                                                </button>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                <div class="form-check font-size-16">--}}
{{--                                                    <input class="form-check-input" type="checkbox" id="transactionCheck07">--}}
{{--                                                    <label class="form-check-label" for="transactionCheck07"></label>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2545</a> </td>--}}
{{--                                            <td>Jacob Hunter</td>--}}
{{--                                            <td>--}}
{{--                                                04 Oct, 2019--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                $392--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <i class="fab fa-cc-paypal me-1"></i> Paypal--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <!-- Button trigger modal -->--}}
{{--                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">--}}
{{--                                                    View Details--}}
{{--                                                </button>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                                <!-- end table-responsive -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                @if($setting->order_type == 'site')
                    <!-- apexcharts -->
                <script src="{{asset('assets/admin')}}/libs/apexcharts/apexcharts.min.js"></script>

                <!-- apexcharts init -->
                <script src="{{asset('assets/admin')}}/js/pages/apexcharts.init.js"></script>
                <script>
                    var columnChartColors = getChartColorsArray("column_chart");
                    columnChartColors && (options = {
                        chart: {height: 350, type: "bar", toolbar: {show: !1}},
                        plotOptions: {bar: {horizontal: !1, columnWidth: "45%", endingShape: "rounded"}},
                        dataLabels: {enabled: !1},
                        stroke: {show: !0, width: 2, colors: ["transparent"]},
                        series: [{
                            name: "طلبات مقبولة",
                            data: [{{implode(',',$dataOfOrder['acceptedData'])}}]
                        }, {
                            name: "طلبات مكتملة",
                            data: [{{implode(',',$dataOfOrder['completedData'])}}]
                        }, {
                            name: "طلبات مرفوضة",
                            data: [{{implode(',',$dataOfOrder['refusedData'])}}]
                        }],
                        colors: columnChartColors,
                        xaxis: {categories: [
                                "يناير",
                                "فبراير",
                                "مارس",
                                "أبريل",
                                "مايو",
                                "يونيو",
                                "يوليو",
                                "أغسطس",
                                "سبتمبر",
                                "أكتوبر",
                                "نوفمبر",
                                "ديسمبر",
                            ]},
                        yaxis: {title: {text: " جنيه مصري ", style: {fontWeight: "500"}}},
                        grid: {borderColor: "#f1f1f1"},
                        fill: {opacity: 1},
                        tooltip: {
                            y: {
                                formatter: function (e) {
                                    return   e +" ج.م"
                                }
                            }
                        }
                    }, (chart = new ApexCharts(document.querySelector("#column_chart"), options)).render());
                </script>
                @endif
@endsection
@section('admin-js')

@endsection
