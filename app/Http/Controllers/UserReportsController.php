<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\SaleItem;
use App\Models\PurchaseItem;
use App\Models\Receipt;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
class UserReportsController extends Controller
{
    public function reports($id)
    {
        $this->data['tab_menu'] = 'reports';
        $this->data['user'] = User::findOrFail($id);

        $this->data['sales'] = SaleItem::select('products.title', DB::raw('SUM(sale_items.quantity) as quantity, AVG(sale_items.price) as price, SUM(sale_items.total) as total'))
            ->join('products','sale_items.product_id','=','products.id')
            ->join('sale_invoices','sale_items.sale_invoice_id','=','sale_invoices.id')
            ->where('products.has_stock',1)
            ->groupBy('products.title')
            ->where('sale_invoices.user_id','=',$id)
            ->get();
        $this->data['purchases'] = PurchaseItem::select('products.title', DB::raw('SUM(purchase_items.quantity) as quantity, AVG(purchase_items.price) as price, SUM(purchase_items.total) as total'))
            ->join('products','purchase_items.product_id','=','products.id')
            ->join('purchase_invoices','purchase_items.purchase_invoice_id','=','purchase_invoices.id')
            
            ->where('products.has_stock',1)
            ->groupBy('products.title')
            ->where('purchase_invoices.user_id','=',$id)
            ->get();

        $this->data['receipts'] = Receipt::select('date', DB::raw('SUM(receipts.amount) as amount'))
             ->groupBy('date')
             ->where('user_id',$id)
             ->get();
        
        $this->data['payments'] = Payment::select('date', DB::raw('SUM(payments.amount) as amount'))
             ->groupBy('date')
             ->where('user_id',$id)
             ->get();

        return view('users.reports.reports', $this->data);
    }
}
