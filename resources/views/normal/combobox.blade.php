<div class="container">
    <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Combo Box with Extra Sale</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                live the blind texts.</p>
        </div>
    </div>
</div>
<div class="container-wrap">
    <div class="row no-gutters d-flex">
        @foreach ($combos as $item)
        <div class="col-lg-4 d-flex ftco-animate">
            <div class="services-wrap d-flex">
                <a href="#" class="img" style="background-image: url(normal/images/pizza-1.jpg);"></a>
                <div class="text p-4">
                    <h3>{{ $item->name }}</h3>
                    <p>{{ $item->description }}</p>
                    <p class="price"><span>Discount {{ $item->sale }}%</span> <a href="{{ url('/addcombotocart', $item->id) }}"
                            class="ml-2 btn btn-white btn-outline-white">Add to cart</a></p>
                </div>
            </div>
        </div> 
        @endforeach
    </div>
</div>