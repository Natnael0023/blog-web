<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::
            where('user_id',Auth::user()->id)
            ->get();

        // dd($notifications);

        $data = [];
        foreach($notifications as $n)
        {
            $data[] = json_decode($n->data,true);
        }

        return view('notification.notification', compact('notifications','data'));
    }
}
