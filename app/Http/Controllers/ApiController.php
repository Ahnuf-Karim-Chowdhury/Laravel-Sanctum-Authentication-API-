<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    protected function Response($data, $message, $status = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $status);
    }
    protected function errorResponse($message="Error",$status=500){
        return response()->json([
            "message" => $message,
        ], $status);

    }
}
?>
