<form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('admins.store')}}">
    @csrf
    <div class="modal-body">
        <div class="mb-3 h-25">
            <label class="form-label">الصورة</label>
            <input type="file" class="dropify" name="image" data-default-file="{{getUserImage()}}"
                   accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
            <span class="form-text text-info">مسموح فقط بالصيغ الاتية : png, gif, jpeg, jpg, webp</span>
        </div>
        <div class="mb-3">
            <label class="form-label">الاسم</label>
            <input type="text" name="name" class="form-control" placeholder="يرجي ادخال اسم المشرف">
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label class="form-label">البريد الالكتروني</label>
                <input type="email" name="email" class="form-control" placeholder="يرجي ادخال البريد الالكتروني">
            </div>
            <div class="col-6">
                <label class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control" placeholder="*******">
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="addButton">اضافة</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
    </div>
</form>

<script>
    $('.dropify').dropify("Upload Here");
</script>
