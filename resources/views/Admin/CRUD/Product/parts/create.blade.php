<form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('products.store')}}">
    @csrf
    <div class="modal-body">
        <div class="row mb-3 h-25">
            <div class="col-6">
                <label class="form-label">الصورة الرئيسية للمنتج</label>
                <input type="file" class="dropify" name="image" data-default-file="{{getFile()}}"
                       accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
            </div>
            <div class="col-6">
                <label class="form-label">صور المنتج</label>
                <input type="file" class="dropify" name="images[]" multiple data-default-file="{{getFile()}}"
                       accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
            </div>
            <span class="form-text text-info text-center">مسموح فقط بالصيغ الاتية : png, gif, jpeg, jpg, webp</span>
        </div>
        <div class="row">
            <div class="mb-3 col-lg-6">
                <label class="form-label">اسم المنتج</label>
                <input type="text" name="title" class="form-control" placeholder="يرجي ادخال عنوان المنتج">
            </div>
            <div class="templating-select col-lg-6">
                <label class="form-label">القسم</label>
                <select class="form-control" name="category_id">
                    <option disabled selected>--- اختار قسم المنتج ---</option>
                @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="mb-3">
            <label class="form-label">وصف المنتج</label>
            <textarea  name="desc" class="form-control" placeholder="يرجي ادخال وصف المنتج"></textarea>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label class="form-label">السعر الاساسي</label>
                <input type="number" min="0" name="price_before" class="form-control">
            </div>
            <div class="col-3">
                <label class="form-label">السعر بعد الخصم (يترك فارغ او 0 في حالة عدم وجود خصم)</label>
                <input type="number" min="0" value="0" name="price_after" class="form-control">
            </div>
            <div class="col-3">
                <label class="form-label">عدد المراجعات</label>
                <input type="number" name="reviews_num" value="0" class="form-control">
            </div>
            <div class="col-3">
                <label class="form-label">عدد النجوم</label>
                <input type="number" min="1" max="5" name="stars" value="5" class="form-control">
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
    CKEDITOR.replace('desc');
</script>
