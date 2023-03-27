<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\order;
use App\Models\packages;
use App\Models\sub_category;
use App\Models\sub_order;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
   public function index()
   {
      $services = category::all();
      return view('frontend.layouts.index', compact('services'));
   }
   public function makeup_artist_login()
   {
      return view('frontend.layouts.login.makeup_artist_login');
   }
   public function customer_login()
   {
      return view('frontend.layouts.login.customer_login');
   }




   // VIEW DETAILS
   public function view_details($id)
   {
      $category = category::findOrFail($id);
      $sub_categories = sub_category::where('cat_id', $category->id)->get();
      return view('frontend.layouts.service.viewdetails', compact('sub_categories'));
   }

   // CHOOSE ARTIST
   public function choose_artist($id)
   {
      $users = User::where('role_id', 2)->get();
      $packs = packages::where('sub_cat_id', $id)->get();
      return view('frontend.layouts.service.artist_choose', compact('users', 'packs'));
   }


   // VIEW MORE ABOUT ARTIST
   public function view_more($artistId)
   {
      $packages = packages::where('makeup_artist_id', $artistId)->get();
      return view('frontend.layouts.service.view_more_about_artist', compact('packages'));
   }

   // ADD TO CART

   public function add_cart($id)
   {
      $package = packages::where('id', $id)->first();
     
      $cart_add = Cart::add([
         'id' => $package->id,
         'name' => $package->package_name,
         'price' => $package->package_price,
         'qty' => 1,
         'weight' => 1,
         'options' => ['size' => 'large']
      ]);
      return redirect()->back();
   }

   public function cart_list()
   {
      $carts = Cart::content();
      return view('frontend.layouts.service.cart.cart_list', compact('carts'));
   }
   public function cart_checkout()
   {
      $carts = Cart::content();
      if (!auth()->user()) {
         return redirect()->route("customer_login");
      }

      return view('frontend.layouts.service.cart.cart_checkout', compact('carts'));
   }
   public function destroy($rowId)
   {
      Cart::remove($rowId);
      return redirect()->back();
   }


   // PLACE ORDER
   public function place_order(Request $request)
   {
      $carts = Cart::content();
      $total = Cart::total();
      $order = order::create([
            'user_id' => auth()->user()->id,
            'address' => auth()->user()->address,
            'email' => auth()->user()->email,
            'phone' => auth()->user()->phone,
            'total' => floatval(str_replace(',', '', $total))
         ]);
      foreach ($carts as $key => $data) {
         sub_order::create(
            [
               'order_id' => $order->id,
               'package_id' => $data->id,
               'price' => $data->price,
               'quantity' => $data->qty,
               'sub_total' => $data->qty * $data->price
            ]
         );

         
      }
      Cart::destroy();
      return redirect()->route('payment');
   }

   public function payment()
   {
     return view('frontend.layouts.service.place_order.payment');
   }


   // CUSTOMER REGISTRATION
   public function cus_registration()
   {
      return view('frontend.layouts.registration.cus_registration');
   }
   public function create_customer(Request $request)
   {
      $filename = '';
      if ($request->hasFile('image')) {
         $file = $request->file('image');
         if ($file->isValid()) {
            $filename = date('Ymdhms') . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile', $filename);
         }
      }
      User::create([
         'name' => $request->name,
         'email' => $request->email,
         'phone' => $request->phone,
         'role_id' => 3,
         'address' => $request->address,
         'image' => $filename,
         'password' => Hash::make($request->password),

      ]);

      return redirect()->back()->with("success", " Registration successful");
   }




   // MAKEUP ARTSIT REGISTRATION
   public function makeup_artist_registration()
   {
      return view('frontend.layouts.registration.makeup_artist_registration');
   }

   public function create_artist(Request $request)
   {
      $filename = '';
      if ($request->hasFile('image')) {
         $file = $request->file('image');
         if ($file->isValid()) {
            $filename = date('Ymdhms') . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile', $filename);
         }
      }

      User::create([
         'name' => $request->name,
         'email' => $request->email,
         'phone' => $request->phone,
         'role_id' => 2,
         'address' => $request->address,
         'doc' => $request->doc,
         'image' => $filename,
         'password' => Hash::make($request->password),

      ]);

      return redirect()->back()->with("success", " Registration successful");
   }
}
