<div id="gallery">
  <ul>
    <?php foreach ($gallery as $item): ?>
    <li><img src="/uploads/gallery/<?php echo $item->photo ?>" width="619" height="286"
             alt="<?php echo $item->name ?>"/>

      <p><?php echo $item->name ?></p></li>
    <?php endforeach ?>
  </ul>
</div>    