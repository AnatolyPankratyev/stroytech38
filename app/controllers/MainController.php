<?php

namespace app\controllers;

use ishop\App;
use ishop\Cache;

class MainController extends AppController {

    public function indexAction(){
        $price_index = App::$app->getProperty('price_index');
        $brands = \R::find('brand', 'LIMIT 3');
        $hits = \R::find('product', "hit = '1' AND status = '1' LIMIT 8");
        $this->setMeta('Главная страница - СтройТех', 'СтройТех стройматериалы Иркутск', 'СтройТех стройматериалы Иркутск');
        $this->set(compact('brands', 'hits', 'price_index'));
    }

    public function contactAction() {
        $this->setMeta('Контакты - СтройТех', 'СтройТех стройматериалы Иркутск', 'СтройТех стройматериалы Иркутск');
    }
    public function aboutAction() {
        $this->setMeta('О нас - СтройТех', 'СтройТех стройматериалы Иркутск', 'СтройТех стройматериалы Иркутск');
    }
    public function deliveryAction() {
        $this->setMeta('Доставка и оплата - СтройТех', 'СтройТех стройматериалы Иркутск', 'СтройТех стройматериалы Иркутск');
    }

}