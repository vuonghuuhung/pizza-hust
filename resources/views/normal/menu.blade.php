<div class="container">
    <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Our Menu</h2>
            <p class="flip">
                <span class="deg1"></span><span class="deg2"></span><span class="deg3"></span>
            </p>
            <p class="mt-5">
                Far far away, behind the word mountains, far from
                the countries Vokalia and Consonantia, there live
                the blind texts.
            </p>
        </div>
    </div>

    <div class="nav-menu">
        <ul class="menu-list">
            <li class="menu-items">
                <a href="#khai-vi" class="menu-link"> Khai vị </a>
            </li>

            <li class="menu-items">
                <a href="#mon-chinh" class="menu-link">
                    Món chính
                </a>
            </li>

            <li class="menu-items">
                <a href="#trang-mieng" class="menu-link">
                    Tráng miệng
                </a>
            </li>

            <li class="menu-items">
                <a href="#tre-em" class="menu-link"> Trẻ em </a>
            </li>

            <li class="menu-items">
                <a href="#an-kieng" class="menu-link"> Ăn kiêng </a>
            </li>
        </ul>
    </div>

    <div style="padding-top: 5rem" id="khai-vi" class="row">
        <div class="name-menu col-md-12">
            <a href="" class="name-menu__link">Appetizer</a>
        </div>
        
            @foreach ($appetizer_menu as $item)
                
            <div class="pricing-entry d-flex ftco-animate">
                <div class="img"
                style="
                background-image: url(foodimages/{{ $item->image }});
                ">
            </div>
            <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                    <h3><span>{{ $item->name }}</span></h3>
                    <span class="price">{{ $item->price }}</span>
                </div>
                <div class="d-block position-re">
                    <p>
                        {{ $item->description }}
                    </p>
                    <button class="buy-product btn-to-cart">
                            <span class="buy-name"><a href="{{ url('/addtocart', $item->id) }}"">Thêm</a></span>
                            <i class="btn-buy__icon fa-sharp fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
 
    </div>

    <div style="padding-top: 5rem" id="mon-chinh" class="row">
        <div class="name-menu col-md-12">
            <a href="" class="name-menu__link">Main</a>
        </div>
 
            @foreach ($main_menu as $item)
                
            <div class="pricing-entry d-flex ftco-animate">
                <div class="img"
                style="
                background-image: url(foodimages/{{ $item->image }});
                ">
            </div>
            <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                    <h3><span>{{ $item->name }}</span></h3>
                    <span class="price">{{ $item->price }}</span>
                </div>
                <div class="d-block position-re">
                    <p>
                        {{ $item->description }}
                    </p>
                    <button class="buy-product">
                            <span class="buy-name"><a href="{{ url('/addtocart', $item->id) }}"">Thêm</a></span>
                            <i class="btn-buy__icon fa-sharp fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

    </div>

    <div style="padding-top: 5rem" id="trang-mieng" class="row">
        <div class="name-menu col-md-12">
            <a href="" class="name-menu__link">Dessert</a>
        </div>
            @foreach ($dessert_menu as $item)
                
            <div class="pricing-entry d-flex ftco-animate">
                <div class="img"
                style="
                background-image: url(foodimages/{{ $item->image }});
                ">
            </div>
            <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                    <h3><span>{{ $item->name }}</span></h3>
                    <span class="price">{{ $item->price }}</span>
                </div>
                <div class="d-block position-re">
                    <p>
                        {{ $item->description }}
                    </p>
                    <button class="buy-product">
                            <span class="buy-name"><a href="{{ url('/addtocart', $item->id) }}"">Thêm</a></span>
                            <i class="btn-buy__icon fa-sharp fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        
    </div>

    <div style="padding-top: 5rem" id="tre-em" class="row">
        <div class="name-menu col-md-12">
            <a href="" class="name-menu__link">Children</a>
        </div>
            @foreach ($children_menu as $item)
                
            <div class="pricing-entry d-flex ftco-animate">
                <div class="img"
                style="
                background-image: url(foodimages/{{ $item->image }});
                ">
            </div>
            <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                    <h3><span>{{ $item->name }}</span></h3>
                    <span class="price">{{ $item->price }}</span>
                </div>
                <div class="d-block position-re">
                    <p>
                        {{ $item->description }}
                    </p>
                    <button class="buy-product">
                            <span class="buy-name"><a href="{{ url('/addtocart', $item->id) }}"">Thêm</a></span>
                            <i class="btn-buy__icon fa-sharp fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

    </div>

    <div style="padding-top: 5rem" id="an-kieng" class="row">
        <div class="name-menu col-md-12">
            <a href="" class="name-menu__link">Diet</a>
        </div>
            @foreach ($diet_menu as $item)
                
            <div class="pricing-entry d-flex ftco-animate">
                <div class="img"
                style="
                background-image: url(foodimages/{{ $item->image }});
                ">
            </div>
            <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                    <h3><span>{{ $item->name }}</span></h3>
                    <span class="price">{{ $item->price }}</span>
                </div>
                <div class="d-block position-re">
                    <p>
                        {{ $item->description }}
                    </p>
                    <button class="buy-product">
                            <span class="buy-name"><a href="{{ url('/addtocart', $item->id) }}"">Thêm</a></span>
                            <i class="btn-buy__icon fa-sharp fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

    </div>
</div>

