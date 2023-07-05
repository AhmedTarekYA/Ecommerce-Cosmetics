<?php
namespace App\Traits;

trait ResponseTrait
{

    public function addResponse($message = "تم اضافة البيانات بنجاح")
    {
        return [
            'message' => $message,
            'status'  => 200,
        ];
    }

    public function updateResponse($message = "تم تعديل البيانات بنجاح")
    {
        return [
            'message' => $message,
            'status'  => 200,
        ];
    }

    public function deleteResponse($message = "تم حذف البيانات بنجاح")
    {
        return [
            'message' => $message,
            'status'  => 200,
        ];
    }


}
