<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= __('MyWay') ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('jquery-ui.min.css') ?>
    <?= $this->Html->css('jquery.ui.theme.css') ?>
    <?= $this->Html->css('site.css') ?>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('bootstrap-grid.min.css') ?>

    <?= $this->Html->script('jquery-1.12.4.min.js') ?>
    <?= $this->Html->script('jquery-ui-1.10.3.custom.js') ?>
    <?= $this->Html->script('bootstrap.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="" style="background-color: #6c757d">



<div class="container">
    <!-- Stack the columns on mobile by making one full-width and the other half-width -->

    <div class="row">
        <div class="col bg-warning  small-text-center">@ 2020 by VITAMARKERS, FL (USA)</div>
    </div>

    <div class="row">
        <div class="col-6" style="background-color: #020749;">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-8">
                    <img src="../../../webroot/img/logo.png" width="50%" height="50%" style="padding-top: 40px;">
                </div>
            </div>

            <div style="padding-top: 20px;"></div>

            <div class="row">
                <div class="col-8">
                    <p class="text-white">kjdkfg hkdhgdkjgh dkghiahdoiqyo qrqoryoqiry qoir qoyrqo iryq ofosifhsdo fdoiyfdi fy ogydo gydo igyiywr iutwirw</p>
                </div>
                <div class="col-4">
                    <div style="padding-top: 20px;">
                        <button class="btn btn-sm btn-info">START NOW</button>
                    </div>
                </div>
            </div>
            <div class="row align-items-end">
                <div class="col">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link text-white" href="#">HOME <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">PRODUCTS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">PRIVATE LABELS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">WE ARE</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        CONTACT
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6"  style="background-color: #020749;">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../../../webroot/img/slider-1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../../../webroot/img/slider-2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../../../webroot/img/slider-3.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div style="padding-top: 10px"></div>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img src="../../../webroot/img/tablets.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="" class="btn btn-primary btn-sm btn-block">TABLETS</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" >
                <img src="../../../webroot/img/capsulas.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="#" class="btn btn-primary btn-sm btn-block">CAPSULES</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" >
                <img src="../../../webroot/img/liquido.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="#" class="btn btn-primary btn-sm btn-block">LIQUID</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" >
                <img src="../../../webroot/img/powder.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="#" class="btn btn-primary btn-sm btn-block">POWDER</a>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-top: 5px"></div>

    <div class="row">
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <img src="../../../webroot/img/softgels.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="#" class="btn btn-primary btn-sm btn-block">SOFTGELS</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="card" >
                <img src="../../../webroot/img/gummies.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="#" class="btn btn-primary btn-sm btn-block">GUMMIES</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="card" >
                <img src="../../../webroot/img/cosmetics.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="#" class="btn btn-primary btn-sm btn-block">COSMETICS</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="card" >
                <img src="../../../webroot/img/stock_products.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="#" class="btn btn-primary btn-sm btn-block">STOCK PRODUCTS</a>
                </div>
            </div>
        </div>
    </div>


</div>

</body>
</html>
