<?php

namespace App\Http\Controllers;
use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class UserPaymentsController extends Controller
{
    public function __construct()
	{
          parent::__construct();
		  $this->data['tab_menu'] = 'payments';
	}
    public function index($id)
    {
    	$this->data['user'] = User::findOrFail($id);
         
        return view('users.payments.payments', $this->data);

    }

    public function store(PaymentRequest $request, $user_id,$invoice_id=null)
    {
         $formData =  $request->all();
         $formData['user_id'] = $user_id;
         $formData['admin_id'] = Auth::id();
         if($invoice_id){
             $formData['purchase_invoice_id'] = $invoice_id;
         }
        if(Payment::create($formData)){
            Session::flash('message','Payment Added successfully.');//ei message ta layout/main.blade.php file ekta section create kora ase alert msg dekhar jonno
        }
        
        if($invoice_id){
            return redirect()->route('user.purchases.invoice_details',['id'=>$user_id, 'invoice_id'=>$invoice_id]);
        }else{
            return redirect()->route('users.show',['user' => $user_id]);
        }
    }

    /**
     * Remove the specified resource from storage.
    
     */
    public function destroy($user_id,$payment_id)
    {   
    	if( Payment::destroy($payment_id)){
    		 Session::flash('message','Payment deleted successfully.');
    	}
        
        return redirect()->route('user.payments',['id' => $user_id]);
  
    }
}
