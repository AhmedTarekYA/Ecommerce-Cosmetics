<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Traits\ResponseTrait;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;


class AdminController extends Controller
{
    use UploadFiles,ResponseTrait;
    public function index(request $request)
    {
        if ($request->ajax()) {
            $data = Admin::query();
            return DataTables::of($data)
                ->editColumn('created_at', function ($row) {
                    try {
                        return $row->created_at->diffForHumans();
                    }
                    catch (\Exception $e){
                        return $e->getMessage();
                    }
                })
                ->editColumn('image', function ($row) {
                    return ' <img src="' . getUserImage($row->image) . '" class="avatar-xs rounded-circle" onclick="window.open(this.src)">';
                })
                ->addColumn('actions', function ($row) {
                    return "
                    <div class='d-flex gap-3'>
                    <a href='javascript:void(0);' class='text-info editBtn' data-id='" . $row->id . "'> <i class='mdi mdi-pencil font-size-18'></i></a>
                   <a href='javascript:void(0);' class='text-danger delete' data-id='" . $row->id . "'><i class='mdi mdi-delete font-size-18'></i> </a>
                   </div>
                   ";

                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.CRUD.Admin.index');
    }


    public function create()
    {
        return view('Admin.CRUD.Admin.parts.create');
    }


    public function store(AdminRequest $request)
    {
        $validatedData = $request->validated();

        if($request->has('image'))
            $validatedData['image'] = $this->saveFile($request->image,'assets/uploads/admins','yes',70);

        $validatedData['password'] = Hash::make($request->password);

        Admin::create($validatedData);
        return $this->addResponse("تم اضافة مشرف جديد");
    }



    public function edit($id)
    {
        $row = Admin::findOrFail($id);
        return view('Admin.CRUD.Admin.parts.edit',compact('row'));
    }


    public function update(AdminRequest $request, $id)
    {
        $validatedData = $request->validated();

        $row = Admin::findOrFail($id);

        /// adjust data before save it ////
        if ($request->hasFile('image')){
            // delete old image
            if (file_exists($row->image)) {
                unlink($row->image);
            }
            $validatedData['image'] = $this->saveFile($request->image,'assets/uploads/admins','yes',70);
        }

        if ($request->has('password') && $request->password !='')
            $validatedData['password'] = Hash::make($request->password);
        else
            unset($validatedData['password']);

        ////////////////////////////////////

        $row->update($validatedData);

        return $this->updateResponse("تم تعديل بيانات المشرف");
    }


    public function destroy($id)
    {
        $row = Admin::findOrFail($id);

        if(loggedAdmin('id') == $row->id)
            return response()->json(['status'  => 405,]);

        else{
            if (file_exists($row->image)) {
                unlink($row->image);
            }
            $row->delete();
            return $this->deleteResponse("تم حذف بيانات المشرف بنجاح");
        }
    }
}
