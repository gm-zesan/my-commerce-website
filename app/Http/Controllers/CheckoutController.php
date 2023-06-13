<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Session;
use ShoppingCart;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetails;
    public function index(){
        return view('website.checkout.index');
    }

    public function newCashOrder(Request $request){
        $this->customer = new Customer();
        $this->customer->name = $request->name;
        $this->customer->email = $request->email;
        $this->customer->mobile = $request->mobile;
        $this->customer->password = bcrypt($request->mobile);
        $this->customer->save();



        $this->order = new Order();
        $this->order->customer_id = $this->customer->id;
        $this->order->order_date = date('Y-m-d');
        $this->order->order_timestamp = strtotime(date('Y-m-d'));
        $this->order->order_total = Session::get('order_total');
        $this->order->tax_total = Session::get('tax_total');
        $this->order->shipping_total = Session::get('shipping_total');
        $this->order->delivery_address = $request->delivery_address;
        $this->order->payment_type = $request->payment_type;
        $this->order->save();


        foreach(ShoppingCart::all() as $item){
            $this->OrderDetail = new OrderDetail();
            $this->OrderDetail->order_id = $this->order->id;
            $this->OrderDetail->product_id = $item->id;
            $this->OrderDetail->product_name = $item->name;
            $this->OrderDetail->product_price = $item->price;
            $this->OrderDetail->product_qty = $item->qty;
            $this->OrderDetail->save();
        }

        return redirect('/complete-order')->with('message', 'Order placed successfully');

    }

    public function completeOrder(){
        return view('website.checkout.complete-order');
    }
}
