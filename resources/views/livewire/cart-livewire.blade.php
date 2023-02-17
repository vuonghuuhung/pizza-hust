<div>
    @include('normal.header')

    <section class="h-100 gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0 text-dark">Cart - {{ $cart_counter }} items</h5>
                        </div>
                        <div class="card-body">
                            <!-- Single item -->
                            @foreach ($cart as $item)
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                            data-mdb-ripple-color="light">
                                            <img src="foodimages/{{ $item->image }}" class="w-100"
                                                alt="Blue Jeans Jacket" />
                                            <a href="#!">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)">
                                                </div>
                                            </a>
                                        </div>
                                        <!-- Image -->
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong>{{ $item->name }}</strong></p>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Size</label><br>
                                            <label class="">
                                                <input wire:click='chooseSize({{ $item->id }})' type="radio" class="" name="size" id="optionsRadios2"
                                                    value="0">S</label>
                                            <label class="">
                                                <input wire:click='chooseSize({{ $item->id }})'  type="radio" class="" name="size" id="optionsRadios2"
                                                    value="1">M</label>
                                            <label class="">
                                                <input wire:click='chooseSize({{ $item->id }})'  type="radio" class="" name="size" id="optionsRadios2"
                                                    value="2">L</label>
                                        </div>
                                        <div>
                                            <label for="">Base</label><br>
                                            <label class="">
                                                <input type="radio" class="" name="base" id="optionsRadios2"
                                                    value="0">Thick</label>

                                            <label class="">
                                                <input type="radio" class="" name="base" id="optionsRadios2"
                                                    value="1">Soft</label>
                                        </div>
                                        @if (strpos($item->name, 'Pizza'))
                                            <div>
                                                <label for="">Topping</label><br>
                                                @if ($item->has_double_sauce)
                                                    <label class="">
                                                        <input type="radio" class="" name="topping"
                                                            id="optionsRadios2" value="0">Double Sauce
                                                    </label>
                                                @endif
                                                @foreach ($topping as $item_topping)
                                                    <br>
                                                    <label class="">
                                                        <input type="radio" class="" name="topping"
                                                            id="optionsRadios2"
                                                            value="0">{{ $item_topping->name }}{{ $item->has_double_sauce }}
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                        <button wire:click="deleteFood({{ $item->id }})" class="btn btn-primary btn-sm me-1 mb-2"
                                            title="Remove item">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        <!-- Quantity -->
                                        <div class="d-flex mb-4" style="max-width: 300px">
                                            <button wire:click="decrease({{ $item->id }})" class="btn btn-primary px-3 me-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fa fa-minus"></i>
                                            </button>

                                            <div class="form-outline">
                                                <input id="form1" min="1" name="quantity"
                                                    value="{{ $item->quantity }}" type="number"
                                                    class="form-control text-dark" />
                                                <label class="form-label" for="form1">Quantity</label>
                                            </div>

                                            <button wire:click="increase({{ $item->id }})" class="btn btn-primary px-3 ms-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        <!-- Quantity -->

                                        <!-- Price -->
                                        <p class="text-start text-md-center">
                                            <strong>{{ $item->price }}</strong>
                                        </p>
                                        <!-- Price -->
                                    </div>
                                </div>
                                <hr class="my-4" />
                            @endforeach
                            <!-- Single item -->

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0 text-dark">Summary</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Products
                                    <span>{{ $totalPrice }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping
                                    <span>22000</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total amount</strong>
                                    </div>
                                    <span><strong>{{ $totalPrice + 22000 }}</strong></span>
                                </li>
                            </ul>

                            <button type="button" onclick="document.getElementById('order').scrollIntoView();"
                                class="btn btn-primary btn-lg btn-block">
                                Make Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="order" class="ftco-appointment">
        <div class="container-wrap align-items-center">
            <div class="row no-gutters d-md-flex align-items-center">
                <div class="col-md-6 appointment ftco-animate" style="margin-left: 37rem">
                    <h3 class="mb-3">Your Contact</h3>
                    <form action="{{ url('/makeorder') }}" class="appointment-form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-md-flex">
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" placeholder="Name"
                                    required>
                            </div>
                        </div>
                        <div class="d-me-flex">
                            <div class="form-group">
                                <input name="address" type="text" class="form-control" placeholder="Address"
                                    required>
                            </div>
                        </div>
                        <div class="d-me-flex">
                            <div class="form-group">
                                <input name="phone" type="number" class="form-control" placeholder="Phone Number"
                                    required>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                        <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
                    </div> --}}
                        <div class="form-group">
                            <input type="submit" value="Send" class="btn btn-primary py-3 px-4">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
