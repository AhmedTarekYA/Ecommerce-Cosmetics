@extends('Admin.Layout.app')
@section('title')
    المدونة
@endsection
@section('pageName')
    المدونة
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h4 class="card-title">مدونة الموقع</h4>
                            <p class="card-title-desc">

                            </p>
                        </div>

                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button type="button" id="addBtn"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                        class="mdi mdi-plus me-1"></i> اضافة جديد
                                </button>
                            </div>
                        </div>
                    </div>

                    <table id="main-datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>الصورة</th>
                            <th>العنوان</th>
                            <th>الوصف</th>
                            <th>اضيف بواسطة</th>
                            <th>وقت الاضافة</th>
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
                    <h5 class="modal-title"><span id="operationType"></span> بيانات</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">

                </div>
            </div>
        </div>
    </div>


@endsection
@section('dashboard-js')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        // Show Data Using YAJRA
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'title', name: 'title'},
            {data: 'desc', name: 'desc'},
            {data: 'admin_id', name: 'admin_id'},
            {data: 'created_at', name: 'created_at' },
            {data: 'actions', name: 'actions'},
        ];
    </script>
    @include('Admin.Layout.inc.yajraHelper',['url'=>'blogs']);

@endsection


