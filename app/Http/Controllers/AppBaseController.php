<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;
use Illuminate\Support\Facades\Input;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }
    public function uploadFile($field_name, $destination) {
        // dd(Input::file($field_name));
        if (!is_null(Input::file($field_name))) {
            $file = Input::file($field_name)->getClientOriginalName();
            $input[$field_name] = $file;
            $file1 = Input::file($field_name);
            $file = ucwords(str_replace(" ", "-", $file));
            $uploadSuccess = $file1->move($destination, $file);
            return $file;
        } else {
            return false;
        }
    }
}
