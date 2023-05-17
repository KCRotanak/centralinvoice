<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    public function index()
    { 
        $user = Auth::user()->id;
        $company = Company::select()
        ->where('user_id', '=', $user)
        ->first();

        $currentuserid = Company::find(Auth::user()->company->id);
        // dd($currentuserid);
        $customers = Customer::select()
        ->where('company_id','=',$currentuserid)->get();
        $invoices = Invoice::select()
        ->where('company_id', '=', $company->id)->get();
       
        // dd($invoices->load('user.company'));
        return view('merchant.pages.invoice.index',compact('invoices', 'customers'));
    }
    public function create(Invoice $invoices)
    {
        $user = Auth::user()->id;
        $company = Company::select()
        ->where('user_id', '=', $user)
        ->first();

        // dd($company);

        $invoices = Invoice::get();
        $customers = Customer::where('company_id', '=', $company->id)->get();
        return view('merchant.pages.invoice.create',compact('invoices','company', 'customers'));

    }
    public function edit($id)
    {
        $user = Auth::user()->id;
        $company = Company::select()
        ->where('user_id', '=', $user)
        ->first();

        $invoice = Invoice::find($id);

        $tax = Invoice::find($id)->get('tax');

        foreach ($tax as $tax){
            $old_tax = ($tax->tax * 100 )/ $invoice->subtotal;
        }
        $discount = Invoice::find($id)->get('discount');

        foreach ($discount as $discount){
            $old_discount = ($discount->discount * 100 )/ $invoice->subtotal;
        }
        
        $customers = Customer::where('company_id', '=', $company->id)->get();
        return view('merchant.pages.invoice.edit',compact('invoice','company', 'customers', 'old_tax', 'old_discount'));

    }

    public function generateUniqueCode()
    {
        do {
            $refnumber = random_int(1000000, 9999999);
        } while (Invoice::where("id", "=", $refnumber)->first());
  
        return $refnumber;
    }
    public function generatePinCode()
    {
        do {
            $pincode = random_int(1000, 9999);
        } while (Invoice::where("id", "=", $pincode)->first());
  
        return $pincode;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($this->generateUniqueCode());
        // dd($request);
        // dd($request->all());
        // $request->validate([
        //     'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        // ]);
        $invoice = new Invoice();

        // $image=$request->image;
        // $filename=time().'.'.$image->getClientOriginalExtension();
        // $request->image->move('assets/images',$filename);
        // $invoice->image=$filename;

        if ($image = $request->file('image')) {
            $coverImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            
            Storage::disk('public')->put('/cover/'.$coverImage, File::get($image));
      
            $invoice->image = $coverImage;
        }

        $invoice->refnumber = $this->generateUniqueCode();
        $invoice->pincode = $this->generatePinCode();
        $invoice->date = $request->date;
        $invoice->subtotal = $request->subtotal;
        $invoice->tax = $request->tax;
        $invoice->discount = $request->discount;
        $invoice->totalamount = $request->totalamount;
        $invoice->customer_id = $request->customer_id;
        $invoice->company_id = $request->company_id;

        
        $invoice->save();   
        // dd($request->item["amount"]);

        foreach($request->item as $key => $item)
        {
           $product = $item['product'];
           $unitprice = $item['unitprice'];
           $quantity = $item['quantity'];
           $amount = $item['amount'];
           $request['invoice_id'] = $invoice->id;
           $item = new Item();
           $item->product = $product;
           $item->unitprice = $unitprice;
           $item->quantity = $quantity;
           $item->amount = $amount;
           $item->invoice_id = $request->invoice_id;

           $item->save();

        }
        // return redirect()->back();
        //Toast Message 
        // return redirect()->route('invoices.index', compact('customers'));
        return redirect('/merchant/invoices')->with('success', 'Invoice is created successfully.');
    }
    public function show($id){
        $user = Auth::user()->id;
        $company = Company::select()
        ->where('user_id', '=', $user)
        ->first();

        $invoice = Invoice::find($id);
        $tax = Invoice::find($id)->get('tax');

        foreach ($tax as $tax){
            $old_tax = ($tax->tax * 100 )/ $invoice->subtotal;
        }
        $discount = Invoice::find($id)->get('discount');

        foreach ($discount as $discount){
            $old_discount = ($discount->discount * 100 )/ $invoice->subtotal;
        }

        return view('merchant.pages.invoice.show',compact('invoice','company','old_tax','old_discount'));

    }

    public function update(Request $request, $id)
    {

        // dd($request->all());
        $input = $request->all();

        if ($image = $request->file('image')) {
            $coverImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            
            Storage::disk('public')->put('/cover/'.$coverImage, File::get($image));
            $input['image'] = "$coverImage";
        }else{
            unset($input['image']);
        }
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'assets/images/';
        //     $coverImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $coverImage);
        //     $input['image'] = "$coverImage";
        // }else{
        //     unset($input['image']);
        // }
        // dd($request->totalamount); 
        if(isset($input['image'])){
            $invoices = Invoice::find($id);
            $invoices->date = $request->date;
            $invoices->subtotal = $request->subtotal;
            $invoices->tax = $request->tax;
            $invoices->discount = $request->discount;
            $invoices->image = $input['image']; // store file 
            $invoices->totalamount = $request->totalamount;
            $invoices->customer_id = $request->customer_id;
            $invoices->company_id = $request->company_id;
            $invoices->update();

            // remove old data
            Item::query()->where("invoice_id", "=", $invoices->id)->delete();
            
            foreach($request->item as $key => $itemData)
            {
                
            $item = new Item();
            $item->product = $itemData['product'];
            $item->unitprice = $itemData['unitprice'];
            $item->quantity = $itemData['quantity'];
            $item->amount = $itemData['amount'];
            $item->invoice_id = $invoices->id;
                // dd($item);
            $item->save();

            }
        
        }

            $invoices = Invoice::find($id);
            $invoices->date = $request->date;
            $invoices->subtotal = $request->subtotal;
            $invoices->tax = $request->tax;
            $invoices->discount = $request->discount;
            // $invoices->image = $input['image']; // store file 
            $invoices->totalamount = $request->totalamount;
            $invoices->customer_id = $request->customer_id;
            $invoices->company_id = $request->company_id;
            $invoices->update();

            // remove old data
            Item::query()->where("invoice_id", "=", $invoices->id)->delete();
            
            foreach($request->item as $key => $itemData){
                $item = new Item();
                $item->product = $itemData['product'];
                $item->unitprice = $itemData['unitprice'];
                $item->quantity = $itemData['quantity'];
                $item->amount = $itemData['amount'];
                $item->invoice_id = $invoices->id;
                    // dd($item);
                $item->save();
            }

        //Toast Message 
        return redirect()->route('invoices.index');
        return redirect('/merchant/invoices')->with('success', 'Invoice is updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        // Invoice::find($id)->delete();

        return redirect()->route('invoices.index')->with('success', 'Invoice is deleted successfully.');
    }
}
