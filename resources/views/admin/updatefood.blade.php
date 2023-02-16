<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <head>
        <base href="/public">
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
                        <h3 class="page-title"> Food Management </h3>
                        <nav aria-label="breadcrumb">

                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update food</h4>
                                    <p class="card-description"> You should input all the information </p>
                                    <form class="forms-sample" action="{{ url('/confirmupdatefood', $food->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                id="exampleInputName1" placeholder="Name" value="{{ $food->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Price</label>
                                            <input type="number" name="price" class="form-control"
                                                id="exampleInputName1" placeholder="Price" value="{{ $food->price }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Rechoose the type</label>
                                            <select name="type" class="form-control" id="exampleSelectGender">
                                                <option <?php if ($food->type == 0) echo 'selected'; ?> value="0">Pizza</option>
                                                <option <?php if ($food->type == 1) echo 'selected'; ?> value="1">Side dish</option>
                                                <option <?php if ($food->type == 2) echo 'selected'; ?> value="2">Topping</option>
                                                <option <?php if ($food->type == 3) echo 'selected'; ?> value="3">Drinking</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Has double sauce (Only for pizza, defaults is
                                                No)</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input"
                                                        name="has_double_sauce" id="optionsRadios2" value="0"
                                                        <?php if ($food->has_double_sauce == 0) echo 'checked'; ?> >No</label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input"
                                                        name="has_double_sauce" id="optionsRadios2"
                                                        value="1"  <?php if ($food->has_double_sauce == 1) echo 'checked'; ?> >Yes</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Image upload</label>
                                            <input type="file" value="{{ $food->image }}" name="image" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" value="{{ $food->image }}" class="form-control file-upload-info" disabled
                                                    placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Description</label>
                                            <textarea class="form-control" name="description" id="exampleTextarea1" rows="4">{{ $food->description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    </form>
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
</body>

</html>
