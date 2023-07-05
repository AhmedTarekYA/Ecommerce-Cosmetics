<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Review;
use App\Traits\ResponseTrait;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    use UploadFiles, ResponseTrait;

    public function index(request $request)
    {
        if ($request->ajax()) {
            $data = Product::query();
            return DataTables::of($data)
                ->editColumn('stars', function ($row) {
                    try {
                        $good_stars = '';
                        $bad_stars = '';
                        for ($i = 1; $i <= $row->stars; $i++)
                            $good_stars .= "<i class='bx bxs-star text-warning'></i>";
                        for ($i = 5; $i > $row->stars; $i--)
                            $bad_stars  .= "<i class='bx bx-star text-warning'></i>";

                        if($row->reviews_num != null)
                            $reviews = "<span class='text-dark'>(".$row->reviews_num.") مراجعات</span>";
                        else
                            $reviews = null;
                        return $good_stars . $bad_stars. $reviews;
                    } catch (\Exception $e) {
                        return "خطأ في البيانات";
                    }
                })
                ->editColumn('desc', function ($row) {
                    return Str::limit($row->desc,'40');
                })
                ->editColumn('category_id', function ($row) {
                    return ($row->category->title) ?? '---';
                })
                ->addColumn('details', function ($row) {
                    return "<a href='".route('products.show',$row->id)."' class='text-primary' data-id='" . $row->id . "'> <i class='mdi mdi-information font-size-18'></i></a>";
                })
                ->editColumn('image', function ($row) {
                    return ' <img src="' . getFile($row->image) . '" class="avatar-xs rounded-circle" onclick="window.open(this.src)">';
                })
                ->addColumn('price', function ($row) {
                    if($row->price_after == 0 || $row->price_after == null)
                        return $row->price_before." ج.م";
                    else
                        return '<span class="text-muted"><del>'.$row->price_after.' </del></span>'.$row->price_before." ج.م";
                })
                ->addColumn('actions', function ($row) {
                    return "
                    <div class='d-flex gap-3'>
                    <a href='".route('products.show',$row->id)."' title='التفاصيل' class='text-primary' data-id='" . $row->id . "'> <i class='mdi mdi-information font-size-18'></i></a>
                    <a href='javascript:void(0);' class='text-info editBtn' title='تعديل' data-id='" . $row->id . "'> <i class='mdi mdi-pencil font-size-18'></i></a>
                   <a href='javascript:void(0);' class='text-danger delete' title='حذف' data-id='" . $row->id . "'><i class='mdi mdi-delete font-size-18'></i> </a>
                   </div>
                   ";

                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.CRUD.Product.index');
    }


    public function create()
    {
        $categories = Category::orderBy('title','ASC')->get();
        return view('Admin.CRUD.Product.parts.create',compact('categories'));
    }

    public function show($id){
        $product = Product::with(['images','reviews' => function ($query) {
            $query->latest();
        }])->findOrFail($id);

        return view('Admin.CRUD.Product.parts.details',compact('product'));
    }

    public function addComment(CommentRequest $request){
        $validatedData = $request->validated();

        if ($request->has('image'))
            $validatedData['image'] = $this->saveFile($request->image, 'assets/uploads/reviews', 'yes', 50);

        Review::create($validatedData);

        return $this->addResponse("تم اضافة تعليق جديد");
    }

    public function deleteComment($id) {
        $row = Review::findOrFail($id);
        if (file_exists($row->image)) {
            unlink($row->image);
        }
        $row->delete();
        return response()->json([
            'status' => 200,
            'id' => $id
        ]);
    }


    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->has('image'))
            $validatedData['image'] = $this->saveFile($request->image, 'assets/uploads/products', 'yes', 95);

        $product = Product::create($validatedData);

        // save images of the products
        if($request->images){
            foreach ($request->images as $image) {
                $data['product_id'] = $product->id;
                $data['image'] = $this->saveFile($image, 'assets/uploads/products');
                ProductImage::create($data);
            }
        }
        return $this->addResponse("تم اضافة منتج جديد");
    }


    public function edit($id)
    {
        $row = Product::findOrFail($id);
        $categories = Category::orderBy('title','ASC')->get();
        return view('Admin.CRUD.Product.parts.edit', compact('row','categories'));
    }


    public function update(ProductRequest $request, $id)
    {
        $validatedData = $request->validated();

        $row = Product::findOrFail($id);

        /// adjust data before save it ////
        if ($request->hasFile('image')) {
            // delete old image
            if (file_exists($row->image)) {
                unlink($row->image);
            }
            $validatedData['image'] = $this->saveFile($request->image, 'assets/uploads/products', 'yes', 70);
        }

        ////////////////////////////////////

        $row->update($validatedData);

        return $this->updateResponse();
    }


    public function destroy($id)
    {
        $row = Product::findOrFail($id);
        if (file_exists($row->image)) {
            unlink($row->image);
        }
        foreach ($row->images as $image){
            if (file_exists($image->image)) {
                unlink($image->image);
            }
        }
        $row->delete();
        return $this->deleteResponse();
    }

    public function deleteImage($image_id){
        $row = ProductImage::findOrFail($image_id);
        // at least one photo should be existed to show image details
        $countOfImages = ProductImage::where('product_id',$row->product_id)->get()->count();
        if($countOfImages == 1){
            return response()->json([
                'status'  => 405,
            ]);
        }
        if (file_exists($row->image)) {
            unlink($row->image);
        }
        $row->delete();
        return response()->json([
            'status' => 200,
            'id' => $image_id
        ]);
    }
}
