<!doctype html>
<html lang="en">
<head>
    <base href="/">
    <link rel="shortcut icon" href="images/star.png" type="image/png" />
    <?=$this->getMeta();?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />

    <title>Hello, world!</title>
</head>
<body>
<?php //debug($_SESSION) ;?>
<?php //session_destroy(); ?>
<section class="navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="<?=PATH;?>">
                <img src="images/logo_st.png" width="250px" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=PATH;?>">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="main/about">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="main/contact">Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="main/delivery">Доставка</a>
                    </li>
                </ul>
                <div>
                    <h4 class="my-3 header_tel">8 (3952) 900-420</h4>
                </div>
            </div>
        </nav>
    </div>
</section>
<div class="bg-st">
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 header-left">
                <div class="cart box_1">
                    <a href="cart/show" onclick="getCart(); return false;">
                        <div class="total">
                            <img src="images/cart-1.png" alt="cart" width="35px" />
                            <?php if(!empty($_SESSION['cart'])): ?>
                                <span class="simpleCart_total"><?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?></span>
                            <?php else: ?>
                                <span class="simpleCart_total">Корзина пуста</span>
                            <?php endif; ?>
                        </div>
                    </a>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-6 header-right">
                <div class="search-bar">
                    <form action="search" method="get" autocomplete="off">
                        <input type="text" class="typeahead" id="typeahead" name="s" placeholder="Поиск по товарам">
                        <input type="submit" value="">
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--bottom-header-->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-4 category_toggle catalog">
                <h2 class="py-3">Каталог</h2>
                <div class="collapse_cat">
                    <p>
                        <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Показать все категории
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <?php new \app\widgets\menu\Menu([
                                'tpl' => WWW . '/menu/menu.php',
                            ]); ?>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Скрыть
                            </button>
                        </div>
                        <div class="py-5"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 catalog togg_cat">
                <h2 class="py-3">Каталог</h2>
                <?php new \app\widgets\menu\Menu([
                    'tpl' => WWW . '/menu/menu.php',
                ]); ?>
            </div>
            <div class="col-md-8 main-hits">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($_SESSION['error'])): ?>
                                <div class="alert alert-danger">
                                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($_SESSION['success'])): ?>
                                <div class="alert alert-success">
                                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?=$content;?>
            </div>
        </div>
    </div>
</section>
</div>
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Корзина</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Продолжить покупки</button>
                <a href="cart/view" type="button" class="btn btn-warning">Оформить заказ</a>
                <button type="button" class="btn btn-secondary" onclick="clearCart()">Очистить корзину</button>
            </div>
        </div>
    </div>
</div>
<footer class="py-4 mt-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 d-flex flex-column justify-content-around p-5 p-sm-1">
                <a class="" href="<?=PATH;?>">
                    <img src="images/logo_st.png" width="250px" alt="">
                </a>
                <p class="mt-4">Динамично развивающаяся компания на рынке производственно-технической продукции.</p>
            </div>
            <div class="col-sm-2 pl-5">

            </div>
            <div class="col-sm-6 d-flex flex-column align-items-center justify-content-around">
                <div class="d-flex flex-column align-items-start justify-content-around mt-4">
                    <p>ООО "СтройТех"</p>
                    <p>664511, Иркутская область, Иркутский район, с. Пивовариха, улица Строительная, дом 14А</p>
                    <p>8 (3952) 900-420</p>
                    <p>Время работы:</p>
                    <p>пн-вс 9:00-20:00, без перерыва.</p>
                </div>
                <p class="font_M700 text-center mt-4" style="font-size: small">Дизайн и разработка<br>
                    <a class="" href="https://www.instagram.com/ianfox.traveller/?hl=ru" style="font-size: small">Ian Fox</a></p>
            </div>
        </div>
    </div>
</footer>

<?php $curr = \ishop\App::$app->getProperty('currency'); ?>
<script>
    var path = '<?=PATH;?>',
        course = <?=$curr['value'];?>,
        symboleLeft = '<?=$curr['symbol_left'];?>',
        symboleRight = '<?=$curr['symbol_right'];?>';
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"
></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/validator.js"></script>
<script src="js/typeahead.bundle.js"></script>
<!--dropdown-->
<script src="js/jquery.easydropdown.js"></script>
<!--Slider-Starts-Here-->
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<script src="megamenu/js/megamenu.js"></script>
<script src="js/imagezoom.js"></script>
<script defer src="js/jquery.flexslider.js"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<script src="js/jquery.easydropdown.js"></script>
<script type="text/javascript">
    $(function() {

        var menu_ul = $('.menu_drop > li > ul'),
            menu_a  = $('.menu_drop > li > a');

        menu_ul.hide();

        menu_a.click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true,true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true,true).slideUp('normal');
            }
        });

    });
</script>
<script src="js/main.js"></script>
</body>
</html>