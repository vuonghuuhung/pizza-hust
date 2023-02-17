<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add food to menu</h4>
                <p class="card-description"> You should input all the information </p>
                <form class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleSelectGender">Select Menu</label>
                        <select wire:model="menu" class="form-control" name="combo_name" id="exampleSelectGender">
                            <option value="">----SELECT----</option>
                            <option value="1">Appetizer</option>
                            <option value="2">Main</option>
                            <option value="3">Dessert</option>
                            <option value="4">Children</option>
                            <option value="5">Diet</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Select Food</label>

                        <div class="card-body">
                            <ul id="pizza_list">
                                @foreach ($food_added as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <select wire:model="food_model" wire:click="addFood()" class="form-control" name="pizza_name" id="exampleSelectGender">
                            <option value="">----SELECT----</option>
                            @foreach ($food as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                            @endforeach
                        </select>

                    </div>
                    <button wire:click="addToMenu" type="button" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Appetizer Menu</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Double sauce</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appetizer_menu as $item)
                            <tr align="center">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->typename }}</td>
                                <td>{{ $item->has_sauce }}</td>
                                <td><img style="width: 80px; height: 80px"
                                        src="/foodimages/{{ $item->image }}" alt=""></td>
                                <td>{{ $item->description }}</td>
                                <td><a onclick="return confirm('Are you sure to delete this food?')"
                                        href="{{ url('/deletefood', $item->id) }}"
                                        class="btn btn-danger btn-fw">Delete</a><hr/>
                                    <a href="{{ url('/updatefood', $item->id) }}"
                                        class="btn btn-warning btn-fw">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Main Menu</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Double sauce</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($main_menu as $item)
                            <tr align="center">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->typename }}</td>
                                <td>{{ $item->has_sauce }}</td>
                                <td><img style="width: 80px; height: 80px"
                                        src="/foodimages/{{ $item->image }}" alt=""></td>
                                <td>{{ $item->description }}</td>
                                <td><a onclick="return confirm('Are you sure to delete this food?')"
                                        href="{{ url('/deletefood', $item->id) }}"
                                        class="btn btn-danger btn-fw">Delete</a><hr/>
                                    <a href="{{ url('/updatefood', $item->id) }}"
                                        class="btn btn-warning btn-fw">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Dessert Menu</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Double sauce</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dessert_menu as $item)
                            <tr align="center">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->typename }}</td>
                                <td>{{ $item->has_sauce }}</td>
                                <td><img style="width: 80px; height: 80px"
                                        src="/foodimages/{{ $item->image }}" alt=""></td>
                                <td>{{ $item->description }}</td>
                                <td><a onclick="return confirm('Are you sure to delete this food?')"
                                        href="{{ url('/deletefood', $item->id) }}"
                                        class="btn btn-danger btn-fw">Delete</a><hr/>
                                    <a href="{{ url('/updatefood', $item->id) }}"
                                        class="btn btn-warning btn-fw">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Children Menu</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Double sauce</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($children_menu as $item)
                            <tr align="center">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->typename }}</td>
                                <td>{{ $item->has_sauce }}</td>
                                <td><img style="width: 80px; height: 80px"
                                        src="/foodimages/{{ $item->image }}" alt=""></td>
                                <td>{{ $item->description }}</td>
                                <td><a onclick="return confirm('Are you sure to delete this food?')"
                                        href="{{ url('/deletefood', $item->id) }}"
                                        class="btn btn-danger btn-fw">Delete</a><hr/>
                                    <a href="{{ url('/updatefood', $item->id) }}"
                                        class="btn btn-warning btn-fw">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Diet Menu</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Double sauce</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diet_menu as $item)
                            <tr align="center">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->typename }}</td>
                                <td>{{ $item->has_sauce }}</td>
                                <td><img style="width: 80px; height: 80px"
                                        src="/foodimages/{{ $item->image }}" alt=""></td>
                                <td>{{ $item->description }}</td>
                                <td><a onclick="return confirm('Are you sure to delete this food?')"
                                        href="{{ url('/deletefood', $item->id) }}"
                                        class="btn btn-danger btn-fw">Delete</a><hr/>
                                    <a href="{{ url('/updatefood', $item->id) }}"
                                        class="btn btn-warning btn-fw">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>