<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Admin\Product;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $cartCollection = \Cart::getContent();
        return view('user.order.index')->with(['cartCollection' => $cartCollection]);
    }

    public function placedOrder(Request $request)
    {
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        // dd($user);
        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           => auth()->user()->id,
            'status'            =>  'pending',
            'grand_total'       =>  \Cart::getSubTotal(),
            'item_count'        =>  \Cart::getTotalQuantity(),
            'payment_status'    =>  0,
            'name'        =>  auth()->user()->name,
            'address'           =>  $user->address,
            'mobile_no'      =>  $user->mobile_no,
        ]);
    
        if ($order) {
    
            $items = \Cart::getContent();
    
            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('product_name', $item->name)->first();
    
                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->getPriceSum()
                ]);
    
                $order->items()->save($orderItem);
                \Cart::clear();
            }
        }
        // return redirect()->route('order.details', $order->id)->with('success', "Order Placed Successfully!");
    }
}
