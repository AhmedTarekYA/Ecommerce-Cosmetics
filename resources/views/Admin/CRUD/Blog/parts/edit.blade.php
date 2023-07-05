<form id="updateForm" class="updateForm" method="POST" enctype="multipart/form-data" action="{{route('blogs.update',$row->id)}}">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <input type="hidden" value="{{$row->id}}" name="id">
        <div class="mb-3 h-25">
            <label class="form-label">الصورة (يفضل ان تكون صورة عالية الجودة بعرض 700px وارتفاع 400px)</label>
            <input type="file" class="dropify" name="image" data-default-file="{{getFile($row->image)}}"
                   accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
            <span class="form-text text-info">مسموح فقط بالصيغ الاتية : png, gif, jpeg, jpg, webp</span>
        </div>
        <div class="mb-3">
            <label class="form-label">العنوان</label>
            <input type="text" name="title" class="form-control" placeholder="" value="{{$row->title}}">
        </div>
        <div class="mb-3">
            <label class="form-label">الوصف</label>
            <textarea id="desc" name="desc" required>{!! $row->desc !!}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="updateButton">تحديث</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
    </div>
</form>

<script>
    $('.dropify').dropify();
    CKEDITOR.replace('desc');
</script>
