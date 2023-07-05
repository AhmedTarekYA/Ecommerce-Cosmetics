<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ResponseTrait;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    use UploadFiles, ResponseTrait;

    public function index(request $request)
    {
        if ($request->ajax()) {
            $data = User::query();
            return DataTables::of($data)
                ->editColumn('created_at', function ($row) {
                    try {
                        return $row->created_at->diffForHumans();
                    } catch (\Exception $e) {
                        return $e->getMessage();
                    }
                })
                ->editColumn('phone', function ($row) {
                    try {
                        return "<a href='tel:".$row->phone."'>$row->phone</a>";
                    } catch (\Exception $e) {
                        return $e->getMessage();
                    }
                })
                ->editColumn('image', function ($row) {
                    return ' <img src="' . getUserImage($row->image) . '" class="avatar-xs rounded-circle" onclick="window.open(this.src)">';
                })
                ->editColumn('email', function ($row) {
                    try {
                        return "<a href='mailto:".$row->email."'>$row->email</a>";
                    } catch (\Exception $e) {
                        return $e->getMessage();
                    }
                })
                ->addColumn('actions', function ($row) {
                    return "
                    <div class='d-flex gap-3'>
                   <a href='javascript:void(0);' class='text-danger delete' data-id='" . $row->id . "'><i class='mdi mdi-delete font-size-18'></i> </a>
                   </div>
                   ";
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.CRUD.User.index');
    }


    public function destroy($id)
    {
        $row = User::findOrFail($id);
        $row->delete();
        return $this->deleteResponse();
    }
}
