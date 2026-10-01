<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
 public function showLogin(){ return view('auth.login'); }
 public function login(Request $request){
  $data=$request->validate(['email'=>'required|email','password'=>'required']);
  $user=User::where('email',$data['email'])->first();
  if(!$user || !Hash::check($data['password'],$user->password)) return back()->withErrors(['email'=>'Invalid administrator credentials.'])->withInput();
  $request->session()->regenerate(); $request->session()->put('admin_id',$user->id); return redirect()->route('admin.dashboard')->with('success','Welcome back to TechNova Admin.');
 }
 public function logout(Request $request){ $request->session()->forget('admin_id'); $request->session()->invalidate(); $request->session()->regenerateToken(); return redirect()->route('login'); }
}
