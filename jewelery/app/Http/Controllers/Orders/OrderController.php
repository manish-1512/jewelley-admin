<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\UserAddressModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{       
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($user_id = null)
    {   
            if($user_id){
                $OrderModels = $this->orderModel::join('users','users.id', '=', 'orders.user_id')->where('orders.user_id',$user_id)->get(['orders.id','orders.order_id','orders.total_payment','orders.status','orders.created_at','users.first_name'])->toArray();
            }             

            else{
                $OrderModels = $this->orderModel::join('users','users.id', '=', 'orders.user_id')->get(['orders.id','orders.order_id','orders.total_payment','orders.status','orders.created_at','users.first_name'])->toArray();  
            }
        
     
        return view('admin.Orders.Orders',['OrderModels' => $OrderModels]);
            
    }


        public function OrderDetails(Request $req){

                //data fetch from order table 
              $data=   orderModel::where('id',$req->id)->first()->toArray();

               

              // order address details 
                  $order_address =  UserAddressModel::where('id',$data['address_id'])->first()->toArray();
            
                   $user_details = UserModel::select('first_name','last_name','email','mobile')->where('id',$data['user_id'])->first()->toArray();

                  
                 unset($order_address['id'],$order_address['user_id'],$order_address['created_at'],$order_address['updated_at']);                  
       

                $orderd_product =  OrderItemModel::join('products','products.id', '=', 'order_items.product_id')
                                                    ->where('order_id',$req->id)

                                                    ->get(['order_items.quantity','order_items.price','products.title'])
                                                    
                                                    ->toArray();

                
              
               



             
                return view('admin.Orders.OrderDetails',["order_details" => $data ,"address_details" => $order_address,"orderd_product" => $orderd_product ,"user_details" => $user_details]);

        }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function show(OrderModel $orderModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderModel $orderModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderModel $orderModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderModel $orderModel)
    {
        //
    }
}
