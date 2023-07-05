<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Traits\ResponseTrait;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    use UploadFiles, ResponseTrait;

    public function index(request $request)
    {
        if ($request->ajax()) {
            $data = Blog::query();
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
                ->editColumn('admin_id', function ($row) {
                    return $row->admin->name;
                })
                ->addColumn('actions', function ($row) {
                    return "
                    <div class='d-flex gap-3'>
                    <a href='javascript:void(0);' class='text-info editBtn' data-id='" . $row->id . "'> <i class='mdi mdi-pencil font-size-18'></i></a>
                   <a href='javascript:void(0);' class='text-danger delete' data-id='" . $row->id . "'><i class='mdi mdi-delete font-size-18'></i> </a>
                   </div>
                   ";

                })
                ->editColumn('desc', function ($row) {
                    return Str::limit($row->desc,70);
                })
                ->escapeColumns('image')
                ->make(true);
        }
        return view('Admin.CRUD.Blog.index');
    }


    public function create()
    {
        return view('Admin.CRUD.Blog.parts.create');
    }


    public function store(BlogRequest $request)
    {
        $validatedData = $request->validated();

        // adjust data before save
        if ($request->has('image'))
            $validatedData['image'] = $this->saveFile($request->image, 'assets/uploads/blogs', 'yes', 99);

        $validatedData['admin_id'] = loggedAdmin('id');

        // save data
        Blog::create($validatedData);
        return $this->addResponse();
    }


    public function edit($id)
    {
        $row = Blog::findOrFail($id);
        return view('Admin.CRUD.Blog.parts.edit', compact('row'));
    }


    public function update(BlogRequest $request, $id)
    {
        $validatedData = $request->validated();

        $row = Blog::findOrFail($id);

        /// adjust data before save it ////
        if ($request->hasFile('image')) {
            // delete old image
            if (file_exists($row->image)) {
                unlink($row->image);
            }
            $validatedData['image'] = $this->saveFile($request->image, 'assets/uploads/blogs', 'yes', 99);
        }
        ////////////////////////////////////

        $row->update($validatedData);

        return $this->updateResponse();
    }


    public function destroy($id)
    {
        $row = Blog::findOrFail($id);

        if (file_exists($row->image)) {
            unlink($row->image);
        }
        $row->delete();
        return $this->deleteResponse("تم حذف بيانات المدونة بنجاح");
    }
}
