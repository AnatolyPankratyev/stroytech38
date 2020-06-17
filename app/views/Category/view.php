<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?=$breadcrumbs;?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="container">
    <div class="row">
        <?php if(!empty($products)): ?>
            <?php $curr = \ishop\App::$app->getProperty('currency'); ?>
            <?php foreach($products as $product): ?>
                <div class="col-md-4 col-sm-6 mt-3">
                    <div class="products_dev">
                        <a href="product/<?=$product->alias;?>">
                            <div class="img_product" style="background-image: url('<?=$product->img; ?>');"></div>
                        </a>
                        <a class="link-to-product" href="product/<?=$product->alias;?>"><?=$product->title;?></a>
                        <?php if ($product->price != 0): ?>
                            <p><?=$product->price * $price_index;?> <?=$product->curr;?></p>
                        <?php else: ?>
                            <?php if ($product->price_to): ?>
                                <p>от <?=$product->price_from * $price_index;?> до <?=$product->price_to * $price_index;?> <?=$product->curr;?></p>
                            <?php else: ?>
                                <p class="pt-2 mb-1">от <?=$product->price_from * $price_index;?> <?=$product->curr;?></p>
                            <?php endif; ?>
                        <? endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
    </div>
            <div class="text-center d-flex flex-column align-items-center mt-5">
                <p>(<?=count($products)?> товара(ов) из <?=$total;?>)</p>
                <?php if($pagination->countPages > 1): ?>
                    <?=$pagination;?>
                <?php endif; ?>
            </div>
        <?php else: ?>
        <h3>В этой категории товаров пока нет...</h3>
        <?php endif; ?>
</div>
<!--product-end-->