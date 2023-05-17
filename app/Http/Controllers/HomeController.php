<?php
  
namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $ref = Invoice::pluck('refnumber')->toArray();
    //    dd($ref);
    //    $ref = array_column($ref, 'refnumber');

    //    foreach($invoices as $ref)

    //    dd($ref);

        return view('frontend.home', compact('ref'));
    } 
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('admin.layouts.home');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function merchantHome()
    {

        $user = Auth::user()->id;
        $company = Company::select()
        ->where('user_id', '=', $user)
        ->first();
        $customers = Customer::where('company_id', '=', $company->id)->get()->count();

        $invoices = Invoice::where('company_id', '=', $company->id)->get()->count();

        $totalamounts = Invoice::where('company_id', '=', $company->id)->sum('totalamount');
        $user = Auth::user()->id;
        $company = Company::select()
        ->where('user_id', '=', $user)
        ->first();
        // $companys = Company::get();
        // $companys = ['name' => 'khem', 'phone' => '011222333', 'address' => 'phnompenh'];
        return view('merchant.layouts.home',compact('company', 'customers', 'invoices', 'totalamounts'));
    }


}
