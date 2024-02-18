<?php

namespace App\Traits;
trait ResponseTrait{
    public function success($status=true, $message = "", $data = [], $code = 200){
        return response()->json(["success" => $status, "message" => $message, 'data'=> $data], $code);
    }

    public function fail($e){
        return response()->json(["success" => false, "message" => $e->getMessage()]);
    }
}
