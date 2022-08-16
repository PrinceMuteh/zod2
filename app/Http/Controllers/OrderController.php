<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $orders = DB::table( 'orders' )
        ->join( 'users', 'users.id', '=', 'orders.userId' )
        ->join( 'categories', 'categories.id', '=', 'orders.categoryId' )
        ->select( 'orders.*', 'users.name', 'users.email', 'categories.*' )
        ->get();

        // dd( $orders );
        return view( 'Ecommerce/order-all', [ 'orders' => $orders ] );
    }

    public function cancelledOrders() {
        $orders = DB::table( 'orders' )
        ->join( 'users', 'users.id', '=', 'orders.userId' )->where( 'status', 'cancelled' )
        ->join( 'categories', 'categories.id', '=', 'orders.categoryId' )
        ->select( 'orders.*', 'users.name', 'users.email', 'categories.*' )
        ->get();
        return view( 'Ecommerce/order-cancelled', [ 'orders' => $orders ] );
    }

    public function pendingOrders() {
        $orders = DB::table( 'orders' )
        ->join( 'users', 'users.id', '=', 'orders.userId' )->where( 'status', 'pending' )
        ->join( 'categories', 'categories.id', '=', 'orders.categoryId' )
        ->select( 'orders.*', 'users.name', 'users.email', 'categories.*' )
        ->get();
        return view( 'Ecommerce/order-pending', [ 'orders' => $orders ] );
    }

    public function completedOrders() {
        $orders = DB::table( 'orders' )
        ->join( 'users', 'users.id', '=', 'orders.userId' )->where( 'status', 'Paid' )
        ->join( 'categories', 'categories.id', '=', 'orders.categoryId' )
        ->select( 'orders.*', 'users.name', 'users.email', 'categories.*' )
        ->get();
        return view( 'Ecommerce/order-completed', [ 'orders' => $orders ] );
    }

}
