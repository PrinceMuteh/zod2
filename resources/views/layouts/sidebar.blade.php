<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">@lang('translation.Menu')</li>

                <li>
                    <a href="index">
                        <i data-feather="home"></i>
                        {{-- <span class="badge rounded-pill bg-soft-success text-success float-end">9+</span> --}}
                        <span data-key="t-dashboard">@lang('translation.Dashboards')</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-apps">@lang('translation.Apps')</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-ecommerce">@lang('translation.Ecommerce')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow"
                                data-key="t-level-1-2">@lang('translation.product_management')</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="ecommerce-add-product" data-key="t-add-product">@lang('translation.Add_Product')</a></li>

                                <li><a href="maintenance" data-key="t-level-2-2">@lang('translation.Products')</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow"
                                data-key="t-level-1-2">@lang('translation.orders')</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="maintenance" data-key="t-level-2-1">@lang('translation.all_orders')</a></li>
                                <li><a href="maintenance" data-key="t-level-2-1">@lang('translation.cancelled_orders')</a></li>
                                <li><a href="maintenance" data-key="t-level-2-2">@lang('translation.pending_orders')</a></li>
                                <li><a href="maintenance" data-key="t-level-2-2">@lang('translation.completed_orders')</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2"> Sub Category</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="maintenance" data-key="t-level-2-1">Add Sub Category</a></li>
                                <li><a href="maintenance" data-key="t-level-2-1">All Sub Category</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2"> Sub Category</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" data-key="t-level-2-1">Add Sub Category</a></li>
                                <li><a href="javascript: void(0);" data-key="t-level-2-1">All Sub Category</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2"> Brands</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="maintenance" data-key="t-level-2-1">Add Brands</a></li>
                                <li><a href="maintenance" data-key="t-level-2-1">All Brands</a></li>

                            </ul>
                        </li>
                        <li><a href="ecommerce-products" key="t-products">Refund Request</a></li>
                        <li><a href="ecommerce-product-detail" data-key="t-product-detail">Reviews</a></li>
                        {{-- <li><a href="ecommerce-orders" data-key="t-orders">@lang('translation.Orders')</a></li>
                        <li><a href="ecommerce-customers" data-key="t-customers">@lang('translation.Customers')</a></li>
                        <li><a href="ecommerce-cart" data-key="t-cart">@lang('translation.Cart')</a></li>
                        <li><a href="ecommerce-checkout" data-key="t-checkout">@lang('translation.Checkout')</a></li>
                        <li><a href="ecommerce-shops" data-key="t-shops">@lang('translation.Shops')</a></li> --}}

                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="user"></i>
                        <span data-key="t-email">Auctions</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maintenance" data-key="t-inbox">Add Auction</a></li>
                        <li><a href="maintenance" data-key="t-read-email">All Auctions</a></li>
                        <li><a href="maintenance" data-key="t-read-email">Completed Auctions</a></li>
                        <li><a href="maintenance" data-key="t-read-email">Pending Auctions</a></li>
                        <li><a href="maintenance" data-key="t-read-email">Expire Auctions</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="user"></i>
                        <span data-key="t-email">Barter</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maintenance" data-key="t-inbox">New Barter</a></li>
                        <li><a href="maintenance" data-key="t-read-email">All Barter</a></li>
                        <li><a href="maintenance" data-key="t-read-email">Completed Barter</a></li>
                        <li><a href="maintenance" data-key="t-read-email">Pending Barter</a></li>
                        <li><a href="maintenance" data-key="t-read-email">Expired Barter</a></li>
                    </ul>
                </li>



                <li class="menu-title" data-key="t-pages">@lang('translation.Pages')</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="layers"></i>
                        <span data-key="t-authentication">Wallet</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maintenance" data-key="t-login">Fund Wallet</a></li>
                        <li><a href="maintenance" data-key="t-login">View Wallet</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages">Analysis</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maintenance" data-key="t-login">Financial Analysis</a></li>
                        <li><a href="maintenance" data-key="t-login">Sales Analysis</a></li>
                        <li><a href="maintenance" data-key="t-login">Barter Analysis</a></li>
                        <li><a href="maintenance" data-key="t-login">Auction Analysis</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages">Reviews</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maintenance" data-key="t-login">Financial Reviews</a></li>
                        <li><a href="maintenance" data-key="t-login">Sales Reviews</a></li>
                        <li><a href="maintenance" data-key="t-login">Barter Reviews</a></li>
                        <li><a href="maintenance" data-key="t-login">Auction Reviews</a></li>

                    </ul>
                </li>



                <li class="menu-title mt-2" data-key="t-components">Setting</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="briefcase"></i>
                        <span data-key="t-components">Account</span>
                    </a>


                </li>
                <li><a href="javascript: void(0);" data-key="t-login">    <i data-feather="briefcase"></i> Support</a></li>

            </ul>
{{-- 
            <div class="card sidebar-alert shadow-none text-center mx-4 mb-0 mt-5">
                <div class="card-body">
                    <img src="assets/images/giftbox.png" alt="">
                    <div class="mt-4">
                        <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                        <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                        <a href="#!" class="btn btn-primary mt-2">Upgrade Now</a>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
