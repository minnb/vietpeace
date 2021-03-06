<div id="preloader">
    <div class="sk-spinner sk-spinner-wave">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
    </div>
</div>
<div class="layer"></div>
<header>
    <div id="top_line">
        <div class="container">
            <div class="row">
                <div class="col-6"><i class="icon-phone"></i><strong>{{ $info_company_config->phone }}</strong></div>
                <div class="col-6">
                    <ul id="top_links">
                        <li><a href="#sign-in-dialog" id="access_link">Sign in</a></li>
                        <li><a href="#" id="wishlist_link">Wishlist</a></li>
                    </ul>
                </div>
            </div><!-- End row -->
        </div><!-- End container-->
    </div><!-- End top line-->
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div id="logo_home">
                	<h1><a href="{{ url('/') }}" title="{{ $info_company_config->company }}">{{ $info_company_config->company }}</a></h1>
                </div>
            </div>
            <nav class="col-9">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{ asset('public/home/img/logo_sticky.png') }}" width="160" height="34" alt="{{ $info_company_config->company }}" data-retina="true">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                    <ul>
                        @foreach(App\Models\Menu::getListMenu() as $item)
                            <?php $lstSub = App\Models\Menu::getSubMenuFromCate($item['id']); ?>
                            <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu">{{$item['name']}} @if(!empty($lstSub))<i class="icon-down-open-mini"></i>@endif</a>
                            @if(!empty($lstSub) && count($lstSub) > 0)
                                <ul>
                                @foreach($lstSub as $subItem)
                                    <?php $lstSub2 = App\Models\Menu::getSub2MenuFromCate($subItem['id']); ?>
                                        @if(is_array($lstSub2) && count($lstSub2) > 0)
                                            <li><a href="javascript:void(0);">{{$subItem['name']}}</a>
                                                <ul>
                                                    @foreach($lstSub2 as $item2)
                                                        <li><a href="{{ route('index.tour.list', ['id'=>$item2['id'], 'name'=>makeUnicode($item2['name'])]) }}">{{$item2['name']}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li><a href="{{ route('index.tour.list', ['id'=>$subItem['id'], 'name'=>makeUnicode($subItem['name'])]) }}">{{$subItem['name']}}</a>
                                        @endif
                                @endforeach
                                </ul>
                            @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <?php 
                    $isCart = 0;
                    if(!Cart::isEmpty()){
                        $isCart = Cart::getContent()->count();
                    }
                 ?>
                <ul id="top_tools">
                    <li>
                        <a href="javascript:void(0);" class="search-overlay-menu-btn"><i class="icon_search"></i></a>
                    </li>
                    <li>
                        <div class="dropdown dropdown-cart">
                            <a href="{{ route('index.tour.cart.get') }}" class="cart_bt"><i class="icon_bag_alt"></i><strong>{{$isCart}}</strong></a>
                            <!--
                            <ul class="dropdown-menu" id="cart_items">
                                <li>
                                    <div class="image"><img src="{{ asset('public/home/img/thumb_cart_1.jpg') }}" alt="image"></div>
                                    <strong><a href="#">Louvre museum</a>1x $36.00 </strong>
                                    <a href="#" class="action"><i class="icon-trash"></i></a>
                                </li>
                                <li>
                                    <div class="image"><img src="{{ asset('public/home/img/thumb_cart_2.jpg') }}" alt="image"></div>
                                    <strong><a href="#">Versailles tour</a>2x $36.00 </strong>
                                    <a href="#" class="action"><i class="icon-trash"></i></a>
                                </li>
                                <li>
                                    <div class="image"><img src="{{ asset('public/home/img/thumb_cart_3.jpg') }}" alt="image"></div>
                                    <strong><a href="#">Versailles tour</a>1x $36.00 </strong>
                                    <a href="#" class="action"><i class="icon-trash"></i></a>
                                </li>
                                <li>
                                    <div>Total: <span>$120.00</span></div>
                                    <a href="cart.html" class="button_drop">Go to cart</a>
                                    <a href="payment.html" class="button_drop outline">Check out</a>
                                </li>
                            </ul>
                            -->
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>