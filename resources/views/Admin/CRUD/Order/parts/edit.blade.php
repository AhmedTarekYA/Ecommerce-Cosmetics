<form id="updateForm" class="updateForm" method="POST" enctype="multipart/form-data" action="{{route('orders.update',$row->id)}}">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <p class="mb-2">رقم الطلب : <span class="text-primary">#{{$row->id}}</span></p>
        <p class="mb-2">اسم العميل : <span class="text-primary">{{$row->user->name}}</span></p>
        <p class="mb-2">عنوان العميل : <span class="text-primary">{{$row->address}}</span></p>
        <p class="mb-4">هاتف العميل : <span class="text-primary">{{$row->phone}}</span></p>

        <div class="table-responsive">
            <table class="table align-middle table-nowrap">
                <thead>
                <tr>
                    <th scope="col">المنتج</th>
                    <th scope="col">اسم المنتج</th>
                    <th scope="col">السعر</th>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $detail)
                <tr>
                    <th scope="row">
                        <div>
                            <img src="{{getFile($detail->product->image)}}" alt="" class="avatar-sm">
                        </div>
                    </th>
                    <td>
                        <div>
                            <h5 class="text-truncate font-size-14">{{$detail->product->title}}</h5>
                            <p class="text-muted mb-0">
                                {{$detail->price/$detail->qty}} ج.م {{$detail->qty}}x
                            </p>
                        </div>
                    </td>
                    <td> {{$detail->price}} ج.م</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2">
                        <h5 class="m-0 text-right">الاجمالي :</h5>
                    </td>
                    <td>
                        {{$row->total_price}} ج.م
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row text-center m-auto">
        <div class="col-4 form-check form-radio-primary mb-3">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="accepted" name="status" {{($row->status == 'accepted') ? 'checked' : ''}}>
                قبول
            </label>
        </div>
        <div class="col-4 form-check form-radio-danger mb-3">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="refused" name="status" {{($row->status == 'refused') ? 'checked' : ''}}>
                رفض
            </label>
        </div>
        <div class="col-4 form-check form-radio-success mb-3">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="completed" name="status" {{($row->status == 'completed') ? 'checked' : ''}}>
                مكتمل
            </label>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="updateButton">تحديث</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
    </div>
</form>

<script>
    $('.dropify').dropify();
</script>
