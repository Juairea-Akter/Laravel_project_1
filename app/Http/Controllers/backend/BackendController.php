<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\co_artist;
use App\Models\order;
use App\Models\packages;
use App\Models\payment;
use App\Models\sub_category;
use App\Models\sub_order;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BackendController extends Controller
{

   // ADMIN LOGIN
   public function login(Request $request)
   {
      $user = $request->validate([
         'email' => ['required', 'email'],
         'password' => ['required'],
      ]);

      if (Auth::attempt($user)) {


         if (Auth::user()->role_id == 1) {
            return redirect()->route('dashboard');
         } else {
            return redirect()->route('signout');
         }
      } else {

         return back();
      }
   }
   public function admin_login()
   {
      return view('backend.layout.admin_login');
   }
   // public function dashboard()
   // {
   //    $orders = order::all();
   //    $suborders = sub_order::all();
   //    $totalOrderPrice = 0;
   //    foreach ($orders as $key => $order) {
   //       foreach ($suborders as $key1 => $sub_order) {
   //          if ($order->id == $sub_order->order_id) {
   //             $totalOrderPrice = $totalOrderPrice + $sub_order->price;
   //          }
   //       }
   //    }
   //    return view('backend.layout.dashboard', compact("totalOrderPrice"));
   // }



   // ORDER LIST ADMIN PANEL
   public function order()
   {
      $orders = order::all();
      $sub_orders = sub_order::all();
      return view('backend.layout.orders.order', compact('orders', 'sub_orders'));
   }





   // MAKEUP ARTIST
   public function makeupartist_list()
   {
      // $users= User::all();for showing all users in the table
      // dd($users);for check

      $users = User::where('role_id', 2)->get();
      return view('backend.layout.makeupartist.makeupartist_list', compact('users'));
   }

   // MAKEUP ARTIST EDIT
   public function makeupartist_list_edit($id)
   {
      $user = User::find($id);
      return view('backend.layout.makeupartist.makeupartist_list_edit', compact('user'));
   }

   // MAKEUP ARTIST UPDATE
   public function makeupartist_list_update(Request $request, $id)
   {

      $user = User::find($id);

      $filename = '';
      if ($request->hasFile('image')) {
         $file = $request->file('image');
         if ($file->isValid()) {
            $filename = date('Ymdhms') . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile', $filename);
         }
      }

      $user->update([
         'name' => $request->name,
         'email' => $request->email,
         'phone' => $request->phone,
         'address' => $request->address,
         'status' => $request->status,
      ]);

      return redirect()->route('makeupartist_list');
   }


   // MAKEUP ARTIST DELETE
   public function makeupartist_list_delete($id)
   {
      $user = User::find($id);
      $img = public_path('\\uploads\\profile\\' . $user->image);
      // $filename = '';
      if (File::exists($img)) {
         File::delete($img);
      }
      $user->delete();
      return redirect()->route('makeupartist_list');
   }



   //  ADMIN CO-ARTIST LIST
   public function co_artist_list()
   {
      $co_artists = co_artist::where('makeup_artist_id', auth()->user()->id)->get();

      return view('backend.layout.co_artist.co_artist_list', compact('co_artists'));
   }



   // CUSTOMER LIST
   public function customer_list()
   {
      $users = User::where('role_id', 3)->get();
      return view('backend.layout.customer.customer_list', compact('users'));
   }

   // Customer List Edit
   public function customer_list_edit($id)
   {
      $user = User::find($id);
      return view('backend.layout.customer.customer_list_edit', compact('user'));
   }

   // Customer List Update
   public function customer_list_update(Request $request, $id)
   {
      $user = User::find($id)->update([
         'name' => $request->name,
         'email' => $request->email,
         'address' => $request->address,
         'phone' => $request->phone,
      ]);
      return redirect()->route('customer_list');
   }

   // Customer List Delete
   public function customer_list_delete($id)
   {
      $user = User::find($id);
      $img = public_path('\\uploads\\profile\\' . $user->image);
      // $filename = '';
      if (File::exists($img)) {
         File::delete($img);
      }
      $user->delete();
      return redirect()->route('customer_list');
   }




   // SHOW PACKAGE LIST IN ADMIN PANEL
   public function package_list()
   {

      $categories = category::all();
      $sub_categories = sub_category::all();
      $packages = packages::all();

      return view('backend.layout.packages.package_list', compact('categories', 'sub_categories', 'packages'));
   }


   // PAYMENT LIST
   public function payment_list()
   {
      $payments = payment::all();
      return view('backend.layout.payment.payment_list', compact('payments'));
   }

   // PAYMENT LIST UPDATE (Comfirm By Admin)
   public function payment_list_update($id)
   {
      $payment = payment::find($id);

      $payment->update([
         'status' => "2",
      ]);

      return redirect()->route('payment_list');
   }



   // SIGN OUT
   public function signout(Request $request)
   {
      Auth::logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect('/');
   }
}
