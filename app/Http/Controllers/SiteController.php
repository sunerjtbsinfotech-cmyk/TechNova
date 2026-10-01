<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Service;
use App\Models\Inquiry;
use Illuminate\Http\Request;
class SiteController extends Controller
{
 public function home(){ return view('home', ['services'=>Service::where('status','active')->get(), 'products'=>Product::where('status','active')->latest()->take(6)->get()]); }
 public function products(Request $request){ $q=$request->get('q'); $products=Product::where('status','active')->when($q,fn($query)=>$query->where(fn($w)=>$w->where('name','like',"%$q%")->orWhere('category','like',"%$q%")))->latest()->paginate(9)->withQueryString(); return view('products',compact('products','q')); }
 public function contact(Request $request){ $data=$request->validate(['name'=>'required|string|max:100','email'=>'required|email|max:150','phone'=>'nullable|string|max:40','service'=>'nullable|string|max:100','message'=>'required|string|max:2000']); Inquiry::create($data); return back()->with('success','Thank you! Your inquiry has been submitted to TechNova.'); }
}
