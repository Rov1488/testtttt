<?php
/**
* @var  $content \core\base\View;
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?=$this->getMeta();?>

    <link href="/public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="/public/css/style.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Dars.loc navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/product/index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart/index">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/category/index">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/product/index">Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Products
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#">Action 1</a></li>
                            <li><a class="dropdown-item" href="#">Action 2</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</nav>
<section class="align-content-center">
    <div class="content-wrapper">
        <div class="container-fluid">

           <?=$content;?>

        </div>
    </div>
</section>
<footer class="bd-footer py-3 py-md-3 mt-3 bg-body-tertiary border-top">
    <div class="container">
        <strong>Copyright &copy; 2014-<?php echo date('Y');?> <a href="https://adminlte.io">Dars.loc</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </div>
</footer>
<script src="/public/js/jquery-1.11.0.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/bootstrap.bundle.min.js"></script>
<script src="/public/js/validator.min.js"></script>
</body>
</html>


