<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?=PATH;?>">Главная→</a></li>
                <li>Поиск по запросу→ "<?=h($query);?>"</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="container">
    <?php if(!empty($products)): ?>
    <h5>Найдено <?=count($products);?> товара(ов) по запросу "<?=h($query);?>"</h5>
    <div class="row">
        <?php $curr = \ishop\App::$app->getProperty('currency'); ?>
        <?php foreach($products as $product): ?>
            <div class="col-md-4 col-sm-6 mt-3">
                <div class="products_dev">
                    <a href="product/<?=$product->alias;?>">
                        <div class="img_product" style="background-image: url('<?=$product->img; ?>');"></div>
                    </a>
                    <a class="link-to-product" href="product/<?=$product->alias;?>"><?=$product->title;?></a>
                    <?php if ($product->price != 0): ?>
                        <p><?=$product->price;?> <?=$product->curr;?></p>
                    <?php else: ?>
                        <?php if ($product->price_to): ?>
                            <p>от <?=$product->price_from;?> до <?=$product->price_to;?> <?=$product->curr;?></p>
                        <?php else: ?>
                            <p class="pt-2 mb-1">от <?=$product->price_from;?> <?=$product->curr;?></p>
                        <?php endif; ?>
                    <? endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
        <h3 class="mt-5">По такому запросу ничего не найдено</h3>
    <?php endif; ?>
</div>
<!--product-end-->