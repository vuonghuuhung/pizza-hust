<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Corona Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="admin/assets/vendors/select2/select2.min.css">
        <link rel="stylesheet" href="admin/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="admin/assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

        <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
        <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
        @livewireStyles
    </head>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navtop')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="page-header">
                        <h3 class="page-title"> Combo Management </h3>
                        <nav aria-label="breadcrumb">

                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add a new combo</h4>
                                    <p class="card-description"> You should input all the information </p>
                                    <form class="forms-sample" action="{{ url('/addcombo') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                id="exampleInputName1" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Sale (%)</label>
                                            <input type="number" name="sale" class="form-control"
                                                id="exampleInputName1" placeholder="Discount Percent">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Number of pizza</label>
                                            <input type="number" name="num_of_pizza" class="form-control"
                                                id="exampleInputName1" placeholder="Number of pizza">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Number of side dish</label>
                                            <input type="number" name="num_of_side_dish" class="form-control"
                                                id="exampleInputName1" placeholder="Number of side dish">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Number of topping</label>
                                            <input type="number" name="num_of_topping" class="form-control"
                                                id="exampleInputName1" placeholder="Number of topping">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Number of water</label>
                                            <input type="number" name="num_of_water" class="form-control"
                                                id="exampleInputName1" placeholder="Number of water">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Size</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="size"
                                                        id="optionsRadios2" value="0" checked>S</label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="size"
                                                        id="optionsRadios2" value="1">M</label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="size"
                                                        id="optionsRadios2" value="2">L</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Show now or later</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="show"
                                                        id="optionsRadios2" value="1" checked>Now</label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="show"
                                                        id="optionsRadios2" value="0">Later</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Image upload</label>
                                            <input type="file" name="image" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Description</label>
                                            <textarea class="form-control" name="description" id="exampleTextarea1" rows="4"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button class="btn btn-dark">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @livewire('box')
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Combo List</h4>
                                {{-- <p class="card-description"> Add class <code>.table-bordered</code> --}}
                                {{-- </p> --}}
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Number of Pizza</th>
                                                <th>Number of Side Dish</th>
                                                <th>Number of Topping</th>
                                                <th>Number of Water</th>
                                                <th>Sale(%)</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Show</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($combos as $item)
                                                <tr align="center">
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->num_of_pizza }}</td>
                                                    <td>{{ $item->num_of_side_dish }}</td>
                                                    <td>{{ $item->num_of_topping }}</td>
                                                    <td>{{ $item->num_of_water }}</td>
                                                    <td>{{ $item->sale }}</td>
                                                    <td><img style="width: 80px; height: 80px"
                                                            src="/foodimages/{{ $item->image }}" alt=""></td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>{{ $item->show }}</td>
                                                    <td><a onclick="return confirm('Are you sure to delete this combo?')"
                                                            href="{{ url('/deletecombo', $item->id) }}"
                                                            class="btn btn-danger btn-fw">Delete</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
            <!-- container-scroller -->
            <!-- plugins:js -->
            <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="admin/assets/vendors/select2/select2.min.js"></script>
            <script src="admin/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="admin/assets/js/off-canvas.js"></script>
            <script src="admin/assets/js/hoverable-collapse.js"></script>
            <script src="admin/assets/js/misc.js"></script>
            <script src="admin/assets/js/settings.js"></script>
            <script src="admin/assets/js/todolist.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page -->
            <script src="admin/assets/js/file-upload.js"></script>
            <script src="admin/assets/js/typeahead.js"></script>
            <script src="admin/assets/js/select2.js"></script>
            <!-- End custom js for this page -->
            <script src="admin/assets/js/dashboard.js"></script>

            <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
            <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
            <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
            <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
            @livewireScripts
</body>

</html>
