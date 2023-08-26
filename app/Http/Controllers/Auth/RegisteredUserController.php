<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Category;
use Illuminate\View\View;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $category = Category::all();
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password'        => ['required', 'confirmed', Rules\Password::defaults()],

            'restaurant_name' => ['required', 'string', 'max:255'],
            'description'     => ['required', 'string', 'max:1000'],
            'city'            => ['required', 'string', 'max:50'],
            'address'         => ['required', 'string', 'max:150'],
            'vat'             => ['required', 'numeric', 'max:10'],
            'url_image'       => ['required', 'string', 'max:500'],
            'priceRange'      => ['required', 'numeric', 'max:200'],
            'rating_value'    => ['required', 'numeric', 'max:250'],
            'review_count'    => ['required', 'numeric', 'max:250'],
        ]);

        $restaurant = Restaurant::create([
            'restaurant_name'   =>  $request->restaurant_name,
            'slug'              =>  Restaurant::slugger($request['restaurant_name']),   
            'description'       =>  $request->description,  
            'city'              =>  $request->city,
            'address'           =>  $request->address,
            'vat'               =>  $request->vat,
            'url_image'         =>  $request->url_image,
            'priceRange'        =>  $request->priceRange,
            'rating_value'      =>  $request->rating_value,
            'review_count'      =>  $request->review_count,

        ]);
        $restaurant->categories()->sync($request['categories'] ?? []);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'restaurant_id' =>$restaurant->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
