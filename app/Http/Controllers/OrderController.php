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
        if ( Auth()->user()->usertype == 'super' || Auth()->user()->usertype == 'admin' ) {

            $orders = DB::table( 'orders' )
            ->join( 'users', 'users.id', '=', 'orders.userId' )
            ->join( 'categories', 'categories.id', '=', 'orders.categoryId' )
            ->select( 'orders.*', 'users.name', 'users.email', 'categories.*' )
            ->get();
        } else {
            $orders = DB::table( 'orders' )->where( 'vendorId', Auth()->user()->id )
            ->join( 'users', 'users.id', '=', 'orders.userId' )
            ->join( 'categories', 'categories.id', '=', 'orders.categoryId' )
            ->select( 'orders.*', 'users.name', 'users.email', 'categories.*' )
            ->get();
        }
        // dd( $orders );
        return view( 'Ecommerce/order-all', [ 'orders' => $orders ] );
    }

    public function cancelledOrders() {
        if ( Auth()->user()->usertype == 'super' || Auth()->user()->usertype == 'admin' ) {
            $orders = DB::table( 'orders' )
            ->join( 'users', 'users.id', '=', 'orders.userId' )->where( 'status', 'cancelled' )
            ->join( 'categories', 'categories.id', '=', 'orders.categoryId' )
            ->select( 'orders.*', 'users.name', 'users.email', 'categories.*' )
            ->get();
        } else {
            $orders = DB::table( 'orders' )->where( 'vendorId', Auth()->user()->id )
            ->join( 'users', 'users.id', '=', 'orders.userId' )->where( 'status', 'cancelled' )
            ->join( 'categories', 'categories.id', '=', 'orders.categoryId' )
            ->select( 'orders.*', 'users.name', 'users.email', 'categories.*' )
            ->get();
        }
        return view( 'Ecommerce/order-cancelled', [ 'orders' => $orders ] );
    }

    public function pendingOrders() {
        if ( Auth()->user()->usertype == 'super' || Auth()->user()->usertype == 'admin' ) {
            $orders = DB::table( 'orders' )
            ->join( 'users', 'users.id', '=', 'orders.userId' )->where( 'status', 'pending' )
            ->join( 'categories', 'categories.id', '=', 'orders.categoryId' )
            ->select( 'orders.*', 'users.name', 'users.email', 'categories.*' )
            ->get();
            return view( 'Ecommerce/order-pending', [ 'orders' => $orders ] );
        } else {
            $orders = DB::table( 'orders' )
            ->join( 'users', 'users.id', '=', 'orders.userId' )
            ->where( 'status', 'pending' )
            ->where( 'vendorId', Auth()->user()->id )
            ->join( 'categories', 'categories.id', '=', 'orders.categoryId' )
            ->select( 'orders.*', 'users.name', 'users.email', 'categories.*' )
            ->get();
            return view( 'Ecommerce/order-pending', [ 'orders' => $orders ] );

        }
    }

    public function completedOrders() {
        if ( Auth()->user()->usertype == 'super' || Auth()->user()->usertype == 'admin' ) {
            $orders = DB::table( 'orders' )
            ->join( 'users', 'users.id', '=', 'orders.userId' )->where( 'status', 'Paid' )
            ->join( 'categories', 'categories.id', '=', 'orders.categoryId' )
            ->select( 'orders.*', 'users.name', 'users.email', 'categories.*' )
            ->get();
        } else {
            $orders = DB::table( 'orders' )->where( 'vendorId', Auth()->user()->id )
            ->join( 'users', 'users.id', '=', 'orders.userId' )->where( 'status', 'Paid' )
            ->join( 'categories', 'categories.id', '=', 'orders.categoryId' )
            ->select( 'orders.*', 'users.name', 'users.email', 'categories.*' )
            ->get();
        }
        return view( 'Ecommerce/order-completed', [ 'orders' => $orders ] );
    }

}
