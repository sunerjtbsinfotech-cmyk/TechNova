<?php
namespace App\Http\Controllers;
use App\Models\Product; use App\Models\Service; use App\Models\Inquiry; use Illuminate\Http\Request; use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
 private function guard(Request $r){ if(!$r->session()->has('admin_id')) return redirect()->route('login'); return null; }
 public function dashboard(Request $r){ if($x=$this->guard($r))return $x; return view('admin.dashboard',['products'=>Product::count(),'services'=>Service::count(),'inquiries'=>Inquiry::count(),'newInquiries'=>Inquiry::where('status','new')->count(),'inventoryValue'=>Product::sum(DB::raw('price * stock')),'recent'=>Inquiry::latest()->take(6)->get()]); }
 public function products(Request $r){ if($x=$this->guard($r))return $x; return view('admin.products.index',['products'=>Product::latest()->paginate(10)]); }
 public function productCreate(Request $r){ if($x=$this->guard($r))return $x; return view('admin.products.form',['product'=>new Product(),'title'=>'Add Product']); }
 public function productStore(Request $r){ if($x=$this->guard($r))return $x; Product::create($r->validate(['name'=>'required|max:120','category'=>'required|max:80','description'=>'nullable|max:1000','price'=>'required|numeric|min:0','stock'=>'required|integer|min:0','status'=>'required|in:active,inactive'])); return redirect()->route('admin.products')->with('success','Product added successfully.'); }
 public function productEdit(Request $r, Product $product){ if($x=$this->guard($r))return $x; return view('admin.products.form',['product'=>$product,'title'=>'Edit Product']); }
 public function productUpdate(Request $r, Product $product){ if($x=$this->guard($r))return $x; $product->update($r->validate(['name'=>'required|max:120','category'=>'required|max:80','description'=>'nullable|max:1000','price'=>'required|numeric|min:0','stock'=>'required|integer|min:0','status'=>'required|in:active,inactive'])); return redirect()->route('admin.products')->with('success','Product updated successfully.'); }
 public function productDelete(Request $r, Product $product){ if($x=$this->guard($r))return $x; $product->delete(); return back()->with('success','Product deleted.'); }
 public function services(Request $r){ if($x=$this->guard($r))return $x; return view('admin.services.index',['services'=>Service::latest()->paginate(10)]); }
 public function serviceCreate(Request $r){ if($x=$this->guard($r))return $x; return view('admin.services.form',['service'=>new Service(),'title'=>'Add Service']); }
 public function serviceStore(Request $r){ if($x=$this->guard($r))return $x; Service::create($r->validate(['name'=>'required|max:120','short_description'=>'required|max:255','description'=>'nullable|max:1000','price_from'=>'nullable|numeric|min:0','icon'=>'required|max:10','status'=>'required|in:active,inactive'])); return redirect()->route('admin.services')->with('success','Service added successfully.'); }
 public function serviceEdit(Request $r, Service $service){ if($x=$this->guard($r))return $x; return view('admin.services.form',['service'=>$service,'title'=>'Edit Service']); }
 public function serviceUpdate(Request $r, Service $service){ if($x=$this->guard($r))return $x; $service->update($r->validate(['name'=>'required|max:120','short_description'=>'required|max:255','description'=>'nullable|max:1000','price_from'=>'nullable|numeric|min:0','icon'=>'required|max:10','status'=>'required|in:active,inactive'])); return redirect()->route('admin.services')->with('success','Service updated successfully.'); }
 public function serviceDelete(Request $r, Service $service){ if($x=$this->guard($r))return $x; $service->delete(); return back()->with('success','Service deleted.'); }
 public function inquiries(Request $r){ if($x=$this->guard($r))return $x; return view('admin.inquiries.index',['inquiries'=>Inquiry::latest()->paginate(12)]); }
 public function inquiryStatus(Request $r, Inquiry $inquiry){ if($x=$this->guard($r))return $x; $inquiry->update(['status'=>$r->validate(['status'=>'required|in:new,contacted,closed'])['status']]); return back()->with('success','Inquiry status updated.'); }
 public function reports(Request $r){ if($x=$this->guard($r))return $x; $categories=Product::select('category',DB::raw('count(*) as total'),DB::raw('sum(stock) as stock'))->groupBy('category')->get(); return view('admin.reports.index',['categories'=>$categories,'inventoryValue'=>Product::sum(DB::raw('price * stock')),'lowStock'=>Product::where('stock','<=',5)->count()]); }
}
