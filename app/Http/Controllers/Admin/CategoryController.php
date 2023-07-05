<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\ResponseTrait;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    use UploadFiles, ResponseTrait;
    public function index(request $request)
    {
        if ($request->ajax()) {
            $data = Category::query();
            return DataTables::of($data)
                ->editColumn('created_at', function ($row) {
                    try {
                        return $row->created_at->diffForHumans();
                    } catch (\Exception $e) {
                        return $e->getMessage();
                    }
                })
                ->editColumn('image', function ($row) {
                    return ' <img src="' . getFile($row->image) . '" class="rounded avatar-md" onclick="window.open(this.src)">';
                })
                ->addColumn('actions', function ($row) {
                    return "
                    <div class='d-flex gap-3'>
                    <a href='javascript:void(0);' class='text-info editBtn' data-id='" . $row->id . "'> <i class='mdi mdi-pencil font-size-18'></i></a>
                   <a href='javascript:void(0);' class='text-danger delete' data-id='" . $row->id . "'><i class='mdi mdi-delete font-size-18'></i> </a>
                   </div>
                   ";

                })
                ->escapeColumns('image')
                ->make(true);
        }
        return view('Admin.CRUD.Category.index');
    }


    public function create()
    {
        return view('Admin.CRUD.Category.parts.create');
    }


    public function store(CategoryRequest $request)
    {
        $validatedData = $request->validated();

        // adjust data before save
        if ($request->has('image'))
            $validatedData['image'] = $this->saveFile($request->image, 'assets/uploads/categories', 'yes', 99);

        // save data
        Category::create($validatedData);
        return $this->addResponse();
    }


    public function edit($id)
    {
        $row = Category::findOrFail($id);
        return view('Admin.CRUD.Category.parts.edit', compact('row'));
    }


    public function update(CategoryRequest $request, $id)
    {
        $validatedData = $request->validated();

        $row = Category::findOrFail($id);

        /// adjust data before save it ////
        if ($request->hasFile('image')) {
            // delete old image
            if (file_exists($row->image)) {
                unlink($row->image);
            }
            $validatedData['image'] = $this->saveFile($request->image, 'assets/uploads/categories', 'yes', 99);
        }
        ////////////////////////////////////

        $row->update($validatedData);

        return $this->updateResponse();
    }


    public function destroy($id)
    {
        $row = Category::findOrFail($id);

        if (file_exists($row->image)) {
            unlink($row->image);
        }
        $row->delete();
        return $this->deleteResponse("تم حذف بيانات القسم بنجاح");
    }
}
