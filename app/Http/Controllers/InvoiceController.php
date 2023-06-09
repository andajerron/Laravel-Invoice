<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoice = Invoice::all();
        return view('home', ['invoice' => $invoice]);

    }

    public function show()
    {
        //
    }

    public function create(Request $request)
    {

        empty($request->all())?false:$this->save($request);

        return view('create-invoice');
    }

    public function save(Request $request)
    {
        $inv_num = $request->input('inv_num');
        $inv_date = $request->input('inv_date');
        $cust_name = $request->input('cust_name');
        $prod_name = $request->input('prod_name');
        $qty = $request->input('qty');
        $price = $request->input('price');
        $total = $request->input('total');

        DB::table('invoices')->insert(['invoice_number'=>$inv_num,
                                       'invoice_date'=>$inv_date,
                                       'customer_name'=>$cust_name,
                                       'product_name'=>$prod_name,
                                       'quantity'=>$qty,
                                       'price'=>$price,
                                       'total'=>$total]);
    }

    public function update(Request $request, $id)
    {
        $invoice = Invoice::find($id);

        empty($request->all())?false:$this->saveUpdate($request, $id);

        return view('update-invoice', ['id' => $id,'invoice' => $invoice]);
    }

    public function saveUpdate(Request $request, $id)
    {
        $inv_num = $request->input('inv_num');
        $inv_date = $request->input('inv_date');
        $cust_name = $request->input('cust_name');
        $prod_name = $request->input('prod_name');
        $qty = $request->input('qty');
        $price = $request->input('price');
        $total = $request->input('total');

        DB::table('invoices')->where(['id'=>$id])->update(['invoice_number'=>$inv_num,
                                       'invoice_date'=>$inv_date,
                                       'customer_name'=>$cust_name,
                                       'product_name'=>$prod_name,
                                       'quantity'=>$qty,
                                       'price'=>$price,
                                       'total'=>$total]);

    }

    public function destroy($id)
    {
        Invoice::find($id)->delete();
        return redirect()->back();
    }
}
