<form id="updateForm" class="updateForm" method="POST" enctype="multipart/form-data" action="{{route('categories.update',$row->id)}}">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <input type="hidden" value="{{$row->id}}" name="id">
        <div class="mb-3 h-25">
            <label class="form-label">الصورة</label>
            <input type="file" class="dropify" name="image" data-default-file="{{getFile($row->image)}}"
                   accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
            <span class="form-text text-info">مسموح فقط بالصيغ الاتية : png, gif, jpeg, jpg, webp</span>
        </div>
        <div class="mb-3">
            <label class="form-label">اسم القسم</label>
            <input type="text" name="title" class="form-control" placeholder="" value="{{$row->title}}">
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
