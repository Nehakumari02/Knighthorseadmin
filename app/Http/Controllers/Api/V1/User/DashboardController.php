<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Models\UserNotification;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Api\Helpers as ApiResponse;

class DashboardController extends Controller
{
    public function notifications()
    {
        $image_paths = [
            'base_url'          => url("/"),
            'path_location'     => files_asset_path_basename("site-section"),
            'default_image'     => files_asset_path_basename("default"),
        ];
        $notifications = UserNotification::auth()->get();


        $message = ['success' => [__('Notification data  fetch successfully!')]];
        $data    = [
            'image_path'        => $image_paths,
            'notification_data' => $notifications,

        ];
        return ApiResponse::success($message, $data);
    }
}
