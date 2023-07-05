<form id="updateForm" class="updateForm" method="POST" enctype="multipart/form-data" action="{{route('products.update',$row->id)}}">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <input type="hidden" value="{{$row->id}}" name="id">
        <div class="row mb-3 h-25">
            <div class="col-12">
                <label class="form-label">الصورة الرئيسية للمنتج</label>
                <input type="file" class="dropify" name="image" data-default-file="{{getFile($row->image)}}"
                       accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
            </div>
            <span class="form-text text-info text-center">مسموح فقط بالصيغ الاتية : png, gif, jpeg, jpg, webp</span>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label class="form-label">اسم المنتج</label>
                <input type="text" name="title" class="form-control" placeholder="يرجي ادخال عنوان المنتج" value="{{$row->title}}">
            </div>
            <div class="templating-select col-lg-6">
                <label class="form-label">القسم</label>
                <select class="form-control" name="category_id">
                    <option disabled>--- اختار قسم المنتج ---</option>
                    @foreach($categories as $category)
                        <option {{($row->id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">وصف المنتج</label>
            <textarea  name="desc" class="form-control" placeholder="يرجي ادخال وصف المنتج">{!! $row->desc !!}</textarea>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label class="form-label">السعر الاساسي</label>
                <input type="number" min="0" name="price_before" class="form-control" value="{{$row->price_before}}">
            </div>
            <div class="col-3">
                <label class="form-label">السعر بعد الخصم (يترك فارغ او 0 في حالة عدم وجود خصم)</label>
                <input type="number" min="0"  name="price_after" class="form-control" value="{{($row->price_after) ?? '0'}}">
            </div>
            <div class="col-3">
                <label class="form-label">عدد المراجعات</label>
                <input type="number" name="reviews_num" value="{{$row->reviews_num}}" class="form-control">
            </div>
            <div class="col-3">
                <label class="form-label">عدد النجوم</label>
                <input type="number" min="1" max="5" name="stars" class="form-control" value="{{$row->stars}}">
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
    CKEDITOR.replace('desc');

</script>
