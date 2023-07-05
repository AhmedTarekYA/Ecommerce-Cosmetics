@extends('Admin.Layout.app')
@section('title')
    طلبات الشراء
@endsection
@section('pageName')
    طلبات الشراء
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h4 class="card-title">الطلبات</h4>
                            <p class="card-title-desc">

                            </p>
                        </div>

                        <div class="col-sm-8">
                            <div class="text-sm-end">

                            </div>
                        </div>
                    </div>

                    <table id="main-datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead class="table-light">
                        <tr>
                            <th>الرقم التعريفي</th>
                            <th>العميل</th>
                            <th>الهاتف</th>
                            <th>العنوان</th>
                            <th>اجمالي السعر</th>
                            <th>الحالة</th>
                            <th>وقت الطلب</th>
                            <th>الملاحظات</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!--  Large modal example -->
    <div class="modal fade bs-example-modal-lg mainModal" id="editOrCreate" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" role="dialog" aria-labelledby="mainModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> تفاصيل الطلب </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">

                </div>
            </div>
        </div>
    </div>


@endsection
@section('dashboard-js')
    <script>
        // Show Data Using YAJRA
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'user_id', name: 'user_id'},
            {data: 'phone', name: 'phone'},
            {data: 'address', name: 'address'},
            {data: 'total_price', name: 'total_price'},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at' },
            {data: 'notes', name: 'notes'},
            {data: 'actions', name: 'actions'},
        ];
    </script>
    @include('Admin.Layout.inc.yajraHelper',['url'=>'orders']);

@endsection


