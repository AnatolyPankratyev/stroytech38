<img src="images/main_1.png" alt="main_1" width="100%">
<?php if($hits): ?>
    <div class="row">
        <?php foreach ($hits as $hit): ?>
            <div class="col-md-4 col-sm-6 mt-3">
                <div class="products_dev">
                    <a href="product/<?=$hit->alias;?>">
                        <div class="img_product" style="background-image: url('<?=$hit->img; ?>');"></div>
                    </a>
                    <a class="link-to-product" href="product/<?=$hit->alias;?>"><?=$hit->title;?></a>
                    <?php if ($hit->price != 0): ?>
                        <p><?=$hit->price * $price_index;?> <?=$hit->curr;?></p>
                    <?php else: ?>
                        <?php if ($hit->price_to): ?>
                            <p>от <?=$hit->price_from * $price_index;?> до <?=$hit->price_to * $price_index;?> <?=$hit->curr;?></p>
                        <?php else: ?>
                            <p class="pt-2 mb-1">от <?=$hit->price_from * $price_index;?> <?=$hit->curr;?></p>
                        <?php endif; ?>
                    <? endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
