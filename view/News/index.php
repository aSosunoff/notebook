
<div>
    <?php foreach($result as $newsItem):?>
        <div class="q">
            <?php echo $newsItem['ID']; ?>
        </div>
        <div class="q">
            <?php echo $newsItem['TEXT']; ?>
        </div>
    <?php endforeach;?>
</div>

