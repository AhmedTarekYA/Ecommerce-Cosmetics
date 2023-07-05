<form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('categories.store')}}">
    @csrf
    <div class="modal-body">
        <div class="mb-3 h-25">
            <label class="form-label">الصورة </label>
            <input type="file" class="dropify" name="image" data-default-file="{{getFile()}}"
                   accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
            <span class="form-text text-info">مسموح فقط بالصيغ الاتية : png, gif, jpeg, jpg, webp</span>
        </div>
        <div class="mb-3">
            <label class="form-label">اسم القسم</label>
            <input type="text" name="title" class="form-control" placeholder="">
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
