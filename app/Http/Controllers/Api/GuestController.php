<?php

namespace App\Http\Controllers\Api;

use App\Models\Guest;
use App\Mail\MailToAdmin;
use App\Mail\MailToGuest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class GuestController extends Controller
{
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request ->all();

        $newGuest = new Guest();
        $newGuest->email = $data['email'];
        $newGuest->name = $data['name'];
        $newGuest->surname = $data['surname'];
        $newGuest->phone = $data['phone'];
        $newGuest->message = $data['message'];

        $newGuest->save();

        Mail::to($newGuest->email)->send(new MailToGuest($newGuest));

        Mail::to(env('ADMIN_ADDRESS', 'admin@deliveboo.com'))->send(new MailToAdmin($newGuest));

        return response()->json([
            'success' => true,

        ]);
    //    return response()->json($request->all());
    }
}
