<?php foreach($region->result() as $item):?>
    <dd region-id="<?php echo $item->region_id;?>"><?php echo $item->region_name;?></dd>
<?php endforeach;?>