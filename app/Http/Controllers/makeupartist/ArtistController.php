<?php

namespace App\Http\Controllers\makeupartist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\co_artist;
use App\Models\order;
use App\Models\packages;
use App\Models\sub_category;
use App\Models\sub_order;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
{
    public function makeup_login(Request $request)
    {
        $user = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($user)) {

            if (Auth::user()->role_id == 2 && Auth::user()->status == "approve") {
                return redirect()->route('makeup_artist_dashboard');
            } else if (Auth::user()->role_id == 3) {

                return redirect()->route('index');
            } else {
                return redirect()->route('makeup_artist_signout');
            }
        } else {

            return back();
        }
    }
    public function makeup_artist_login()
    {
        return view('frontend.layouts.login.makeup_artist_login');
    }
    public function makeup_artist_dashboard()
    {
        return view('frontend.makeup_artist.makeup_artist_layout.makeup_artist_dashboard');
    }


    // MAKEUPARTIST SERVICES
    public function makeup_artist_service()
    {
        $categories = category::all();
        $sub_categories = sub_category::all();
        $packages = packages::where('makeup_artist_id', auth()->user()->id)->get();


        return view('frontend.makeup_artist.makeup_artist_layout.makeup_artist_service.makeup_artist_service_list', compact('categories', 'sub_categories', 'packages'));
    }
    public function makeup_artist_service_add(Request $request)
    {
        packages::create([
            "package_name" => $request->package_name,
            "makeup_artist_id" => auth()->user()->id,
            "cat_id" => $request->cat_id,
            "sub_cat_id" => $request->sub_cat_id,
            "description" => $request->description,
            "package_price" => $request->package_price,


        ]);
        return back();
    }
    public function makeup_artist_service_edit($id)
    {
        $package = packages::find($id);
        $categories = category::all();
        $sub_categories = sub_category::all();

        return view('frontend.makeup_artist.makeup_artist_layout.makeup_artist_service.makeup_artist_service_edit', compact('categories', 'sub_categories', 'package'));
    }
    public function makeup_artist_service_update(Request $request, $id)
    {
        $package = packages::find($id);
        $package->update(
            [
                "package_name" => $request->package_name,
                "cat_id" => $request->cat_id,
                "sub_cat_id" => $request->sub_cat_id,
                "description" => $request->description,
                "package_price" => $request->package_price,
            ]
        );
        return redirect()->route('makeup_artist_service')->with('sucess', 'updated');
    }
    public function makeup_artist_service_delete($id)
    {
        $package = packages::find($id)->delete();


        return redirect()->route('makeup_artist_service')->with('error', ' Deleted');
    }



    // MAKEUP ARTIST CO ARTIST LIST
    public function makeup_artist_co_artist_list()
    {
        $co_artists = co_artist::where('makeup_artist_id', auth()->user()->id)->get();

        return view('frontend.makeup_artist.makeup_artist_layout.makeup_artist_co_artist.makeup_artist_co_artist_list', compact('co_artists'));
    }
    public function makeup_artist_co_artist_add(Request $request)
    {
        //   dd($request->all());
        $filename = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $filename = date('Ymdhms') . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('profile', $filename);
            }
        }
        // dd($filename);
        co_artist::create([
            "name" => $request->name,
            "makeup_artist_id" => auth()->user()->id,
            "email" => $request->email,
            "image" => $filename,
            'phone' => $request->phone,

        ]);
        return back();
    }
    public function makeup_artist_co_artist_list_edit($id)
    {
        $co_artist = co_artist::find($id);

        return view('frontend.makeup_artist.makeup_artist_layout.makeup_artist_co_artist.makeup_artist_co_artist_edit', compact('co_artist'));
    }
    public function makeup_artist_co_artist_list_update(Request $request, $id)
    {
        $co_artist = co_artist::find($id);
        $co_artist->update(

            [
                "name" => $request->name,
                "makeup_artist_id" => auth()->user()->id,
                "email" => $request->email,
                'phone' => $request->phone,
            ]
        );
        return redirect()->route('makeup_artist_co_artist_list')->with('sucess', 'updated');
    }
    public function makeup_artist_co_artist_list_delete($id)
    {

        $co_artist = co_artist::findOrFail($id);
        $services = co_artist::where('id', $co_artist->id)->get();


        foreach ($services as $service) {

            $service->delete();
        }

        return redirect()->route('makeup_artist_co_artist_list')->with('error', ' Deleted');
    }















    // APPOINTMENT LIST
    public function makeup_artist_appointment_list()
    {
        $orders = sub_order::where('makeup_artist_id', auth()->user()->id)->get();
        // foreach ($orders as $order) {
        //     echo $order->customer->name ?? "No Name";
        // }
        return view('frontend.makeup_artist.makeup_artist_layout.makeup_artist_appointment_list', compact('orders'));
    }





    // MAKEUPARTIST SIGNOUT
    public function makeup_artist_signout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // MAKEUPARTIST PROFILE
    public function makeup_artist_profile()
    {
        return view('frontend.makeup_artist.makeup_artist_layout.artist_profile.edit_artist_profile');
    }
}
