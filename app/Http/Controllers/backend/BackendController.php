<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\co_artist;
use App\Models\packages;
use App\Models\sub_category;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BackendController extends Controller
{
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
   public function dashboard()
   {
      return view('backend.layout.dashboard');
   }

   // ORDER
   public function order()
   {
      return view('backend.layout.order');
   }



   // MAKEUP ARTIST
   public function makeupartist_list()
   {
      // $users= User::all();for showing all users in the table
      // dd($users);for check

      $users = User::where('role_id', 2)->get();
      return view('backend.layout.makeupartist.makeupartist_list', compact('users'));
   }
   public function makeupartist_list_edit($id)
   {
      $user = User::find($id);
      return view('backend.layout.makeupartist.makeupartist_list_edit', compact('user'));
   }
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
         'image' => $filename,
         'address' => $request->address,
         'status' => $request->status,
      ]);

      return redirect()->route('makeupartist_list');
   }
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




   // CUSTOMER
   public function customer_list()
   {
      $users = User::where('role_id', 3)->get();
      return view('backend.layout.customer.customer_list', compact('users'));
   }
   public function customer_list_edit($id)
   {
      $user = User::find($id);
      return view('backend.layout.customer.customer_list_edit', compact('user'));
   }
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




   // SHOW PACKAGES LIST
   public function package_list()
   {

      $categories = category::all();
      $sub_categories = sub_category::all();
      $packages = packages::all();


      return view('backend.layout.packages.package_list', compact('categories', 'sub_categories', 'packages'));
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
