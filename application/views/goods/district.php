<?php foreach ($region->result() as $val):?>
<li>
	<a href="javascript:;" region-id="<?php echo $val->region_id;?>" region-type="<?php echo $val->region_type;?>">
		<?php echo $val->region_name;?>
	</a>
</li>
<?php endforeach;?>