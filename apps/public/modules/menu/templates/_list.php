<?php foreach ($menu as $item): ?><a
    href="<?php echo url_for('@page?name=' . $item->url) ?>"><?php echo $item->name ?></a><?php endforeach ?>