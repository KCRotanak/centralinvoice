<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {

    }

    public function search(Request $request)
    {
        // dd($request->all());

        $inputRef  = $request->inputRef;

        // dd($inputRef);   

        $invoice = Invoice::select()
        ->where('refnumber', $inputRef)
        ->get();

        // dd($invoice);
        return view('frontend.invoice.index', compact('invoice'));

    }

    public function pin(Request $request)
    {
        $inputPin = $request->pin;

        $invoice = Invoice::select()
        ->where('pincode', $inputPin)
        ->where('id', $request->invoice_id)
        ->get();

        if (collect($invoice)->isEmpty()){

            return redirect()->back()->with('alert', 'Wrong Pin !!!');

        }
    
        else
 
        foreach($invoice as $invoice){
            
            $tax = $invoice->tax;
    
            $old_tax = ($tax * 100 )/ $invoice->subtotal;


            $discount = $invoice->discount;
            
            $old_discount = ($discount * 100 )/ $invoice->subtotal;

        }
        return view('frontend.invoice.show', compact('invoice', 'old_tax', 'old_discount'));

    }

    
}
