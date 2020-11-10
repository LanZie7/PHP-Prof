<h2>Каталог</h2>

<? foreach ($catalog as $item): ?>
    <h2><a href="/?c=product&a=card&id=<?=$item['id']?>"><?=$item['name']?></a></h2>
    <p><?=$item['description']?></p>
    <p>Цена: <?=$item['price']?></p>
    <hr>
<? endforeach;?>

<a href="/?c=product&page=1">Далее</a>
