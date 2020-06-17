<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <!--<li><a href="index.html">Home</a></li>
                <li class="active">Single</li>-->
                <?=$breadcrumbs;?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<?php
$curr = \ishop\App::$app->getProperty('currency');
$cats = \ishop\App::$app->getProperty('cats');
?>
<div class="container mt-4 product-widget">
    <div class="row">
        <div class="col-sm-4">
            <img src="<?=$product->img;?>" alt="<?=$product->title;?>" width="100%">
        </div>
        <div class="col-sm-8">
            <h4 class="mb-4"><?=$product->title;?></h4>
            <?php if ($product->price != 0): ?>
                <h5><?=$product->price * $price_index;?> <?=$product->curr;?></h5>
            <?php else: ?>
                <?php if ($product->price_to): ?>
                    <h5>от <?=$product->price_from * $price_index;?> до <?=$product->price_to * $price_index;?> <?=$product->curr;?></h5>
                <?php else: ?>
                    <h5 class="pt-2 mb-1">от <?=$product->price_from * $price_index;?> <?=$product->curr;?></h5>
                <?php endif; ?>
            <? endif; ?>
            <div class="quantity">
                <input type="number" size="4" value="1" name="quantity" min="1" step="1">
            </div>
            <a id="productAdd" data-id="<?=$product->id;?>" href="cart/add?id=<?=$product->id;?>" class="add-cart item_add add-to-cart-link cart_inpr">Добавить в корзину</a>
        </div>
    </div>
    <div class="product-desc mt-4">
        <ul class="tag-men">
            <li><span>Категория</span>
                <span>: <a href="category/<?=$cats[$product->category_id]['alias'];?>"><?=$cats[$product->category_id]['title'];?></a></span></li>
        </ul>
        <p class="mt-4"><?=$product->content;?></p>
    </div>
</div>


<?php if($related): ?>
    <div class="latestproducts">
        <div class="product-one">
            <h3>С этим товаром также покупают:</h3>
            <?php foreach($related as $item): ?>
                <div class="col-md-4 col-sm-6 mt-3">
                    <div class="products_dev">
                        <a href="product/<?=$item['alias'];?>">
                            <div class="img_product" style="background-image: url('<?=$item['img']; ?>');"></div>
                        </a>
                        <a class="link-to-product" href="product/<?=$item['alias'];?>"><?=$item['title'];?></a>
                        <?php if ($item['price'] != 0): ?>
                            <p class="pt-2 mb-1"><?=$item['price'] * $price_index;?> <?=$item['curr'];?></p>
                        <?php else: ?>
                            <?php if ($item['price_to']): ?>
                                <p class="pt-2 mb-1">от <?=$item['price_from'] * $price_index;?> до <?=$item['price_to'] * $price_index;?> <?=$item['curr'];?></p>
                            <?php else: ?>
                                <p class="pt-2 mb-1">от <?=$item['price_from'] * $price_index;?> <?=$item['curr'];?></p>
                            <?php endif; ?>
                        <? endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="clearfix"></div>
        </div>
    </div>
<?php endif; ?>

<?php if($recentlyViewed): ?>
    <div class="latestproducts">
        <div class="product-one">
            <h3>Вы также смотрели:</h3>
            <div class="row">
            <?php foreach($recentlyViewed as $item): ?>
                <div class="col-md-4 col-sm-6 mt-3">
                    <div class="products_dev">
                        <a href="product/<?=$item['alias'];?>">
                            <div class="img_product" style="background-image: url('<?=$item['img']; ?>');"></div>
                        </a>
                        <a class="link-to-product" href="product/<?=$item['alias'];?>"><?=$item['title'];?></a>
                        <?php if ($item['price'] != 0): ?>
                            <p class="pt-2 mb-1"><?=$item['price'] * $price_index;?> <?=$item['curr'];?></p>
                        <?php else: ?>
                            <?php if ($item['price_to']): ?>
                            <p class="pt-2 mb-1">от <?=$item['price_from'] * $price_index;?> до <?=$item['price_to'] * $price_index;?> <?=$item['curr'];?></p>
                            <?php else: ?>
                                <p class="pt-2 mb-1">от <?=$item['price_from'] * $price_index;?> <?=$item['curr'];?></p>
                            <?php endif; ?>
                        <? endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<?php endif; ?>