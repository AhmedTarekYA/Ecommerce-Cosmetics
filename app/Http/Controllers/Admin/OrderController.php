<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Traits\ResponseTrait;
use App\Traits\UploadFiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    use UploadFiles, ResponseTrait;

    public function index(request $request)
    {
        if ($request->ajax()) {
            $data = Order::query();
            return DataTables::of($data)
                ->editColumn('created_at', function ($row) {
                    try {
                        return Carbon::parse($row->created_at)->format('Y/m/d h:i a');
                    } catch (\Exception $e) {
                        return $e->getMessage();
                    }
                })
                ->editColumn('user_id', function ($row) {
                    try {
                        return '<img src="' . getUserImage($row->user->image) . '" class="avatar-xs rounded-circle" onclick="window.open(this.src)">'.'<span> '.$row->user->name.'</span>';
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
                ->editColumn('total_price', function ($row) {
                    try {
                        return $row->total_price.' ج.م';
                    } catch (\Exception $e) {
                        return $e->getMessage();
                    }
                })
                ->editColumn('status', function ($row) {
                    if($row->status == 'new')
                        return "<span class='badge rounded-pill text-bg-warning'>جديد</span>";
                    else if($row->status == 'accepted')
                        return "<span class='badge rounded-pill text-bg-primary'>مقبول</span>";
                    else if($row->status == 'refused')
                        return "<span class='badge rounded-pill text-bg-danger'>مرفوض</span>";
                    else if($row->status == 'completed')
                        return "<span class='badge rounded-pill text-bg-success'>مكتمل</span>";
                    else
                        return "ــ";
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
                   <a href='javascript:void(0);' class='text-secondary editBtn' data-id='" . $row->id . "'> <i title='التفاصيل' class='mdi mdi-information-outline font-size-18'></i></a>
                   <a href='javascript:void(0);' class='text-danger delete' data-id='" . $row->id . "'><i class='mdi mdi-delete font-size-18'></i> </a>
                   </div>
                   ";
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.CRUD.Order.index');
    }

    public function update(request $request, $id)
    {
        $row = Order::findOrFail($id);
        $row->update([
            'status' => $request->status
        ]);
        return $this->updateResponse();
    }


    public function edit($id)
    {
        $row = Order::findOrFail($id);
        $details = OrderDetails::where('order_id',$id)->latest()->get();
        return view('Admin.CRUD.Order.parts.edit', compact('details','row'));
    }


    public function destroy($id)
    {
        $row = Order::findOrFail($id);
        $row->delete();
        return $this->deleteResponse();
    }
}
