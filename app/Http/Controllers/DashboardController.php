<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\SaleItem;
use App\Models\PurchaseItem;
use App\Models\Receipt;
use App\Models\Payment;
class DashboardController extends Controller
{

    public function __construct()
    {
    	parent::__construct();
    	$this->data['main_menu'] = 'Dashboard';
    }
	public function index()
	{
		$this->data['totalUsers']     = User::count('id');
		$this->data['totalProducts']  = Product::count('id');
		$this->data['totalSales']     = SaleItem::sum('total');
		$this->data['totalPurchases'] = PurchaseItem::sum('total');
		$this->data['totalReceipts']  = Receipt::sum('amount');
		$this->data['totalPayments']  = Payment::sum('amount');
		$this->data['totalStock']     = PurchaseItem::sum('quantity') - SaleItem::sum('quantity');
		return view('dashboard', $this->data);
	}
}
