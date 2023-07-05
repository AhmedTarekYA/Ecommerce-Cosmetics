<form id="updateForm" class="updateForm" method="POST" enctype="multipart/form-data" action="{{route('admins.update',$row->id)}}">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="mb-3 h-25">
            <label class="form-label">الصورة</label>
            <input type="file" class="dropify" name="image" data-default-file="{{getUserImage($row->image)}}"
                   accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
            <span class="form-text text-info">مسموح فقط بالصيغ الاتية : png, gif, jpeg, jpg, webp</span>
        </div>
        <input type="hidden" value="{{$row->id}}" name="id">
        <div class="mb-3">
            <label class="form-label">اسم المشرف</label>
            <input type="text" name="name" class="form-control" placeholder="يرجي ادخال اسم المشرف" value="{{$row->name}}">
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label class="form-label">البريد الالكتروني</label>
                <input type="email" name="email" class="form-control" placeholder="يرجي ادخال البريد الالكتروني" value="{{$row->email}}">
            </div>
            <div class="col-6">
                <label class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control" placeholder="********">
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="editBtn">تحديث</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
    </div>
</form>

<script>
    $('.dropify').dropify();
</script>
