<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add food to combo</h4>
                <p class="card-description"> You should input all the information </p>
                <form class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleSelectGender">Select Combo Name</label>
                        <select wire:model="combo" class="form-control" name="combo_name" id="exampleSelectGender">
                            <option value="">----SELECT----</option>
                            @foreach ($combos as $item)
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Select Pizza</label>

                        <div class="card-body">
                            <ul id="pizza_list">
                                @foreach ($pizza_added as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <select wire:model="pizza" wire:click="addPizza()" class="form-control" name="pizza_name" id="exampleSelectGender">
                            <option value="">----SELECT----</option>
                            @foreach ($pizzas as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                            @endforeach
                        </select>

                    </div>


                    <div class="form-group">
                        <label for="exampleSelectGender">Select Side Dishes</label>

                        <div class="card-body">
                            <ul id="pizza_list">
                                @foreach ($dishes_added as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <select wire:model="dish" wire:click="addDish()" class="form-control" name="pizza_name" id="exampleSelectGender">
                            <option value="">----SELECT----</option>
                            @foreach ($dishes as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="exampleSelectGender">Select Topping</label>

                        <div class="card-body">
                            <ul id="pizza_list">
                                @foreach ($topping_added as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <select wire:model="topping_" wire:click="addTopping()" class="form-control" name="pizza_name" id="exampleSelectGender">
                            <option value="">----SELECT----</option>
                            @foreach ($topping as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="exampleSelectGender">Select Drinks</label>

                        <div class="card-body">
                            <ul id="pizza_list">
                                @foreach ($drinks_added as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <select wire:model="drink" wire:click="addDrink()" class="form-control" name="pizza_name" id="exampleSelectGender">
                            <option value="">----SELECT----</option>
                            @foreach ($drinks as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                            @endforeach
                        </select>

                    </div>

                    <button wire:click="addToCombo" type="button" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
