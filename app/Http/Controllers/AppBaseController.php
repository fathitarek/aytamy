<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;
use Illuminate\Support\Facades\Input;
use App\Models\customers;

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

    public  function firebase_notification($user_id, $title, $body, $navigation)
    {
        $user = customers::find($user_id);
        
        // if($user->notifications != 1 || $user->firebase_token == null){  // close notification
        //     return false;
        // }

        $token = $user->fb_token;
        if(!in_array($navigation['type'], ['product', 'review'])){ // no3 el data 
            $message = $user->name . ' ' . $body;
        }
         
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $token  = $token;

        $notification = [
            'click_action'  => "FLUTTER_NOTIFICATION_CLICK",
            'title'         => $title,
            'body'          => $message,
            'sound'         => true,
            
        ];
        
        $extraNotificationData = ["message" => $notification, "moredata" => $navigation, 'click_action' => "FLUTTER_NOTIFICATION_CLICK"];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData,
            'click_action' => "FLUTTER_NOTIFICATION_CLICK"
        ];
// server key AAAA
        $headers = [
            'Authorization: key=AAAAzLJen4s:APA91bE584RGDV8A3eulyFqquCI2e83HvK4o2UHE-rBPFgc4tyOgYSrn0cgrSlsmI2zJr86Bt0JWRotprv7r0kibQGxvS0aRRtJVGBce1S1FSYaHno2B_BFqdRKc0resHU8q5twJqhmd',
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        $input = [];
        $input['title']         = $title;
        $input['message']       = $message;
        $input['user_id']       = $user_id;   
        $input['type']          = $navigation['type'];
        $input['navigation_id'] = $navigation['navigation_id']; 

      //  $notification = new Notifications;
       // $notification->fill($input)->save();
        
        return $result;
    }
}
