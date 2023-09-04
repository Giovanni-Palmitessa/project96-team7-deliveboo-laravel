<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

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
    //    return response()->json($request->all());
    }
}
