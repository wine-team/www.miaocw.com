<?php $this->load->view('layout/header');?>
<?php if($advert->num_rows()>0):?>
<div id="focus" class="focus header-advert">
	<ul class="f_ul">
	    <?php foreach ($advert->result() as $key=>$item):?>
	    <li lazy="<?php echo $this->config->show_image_url('advert',$item->picture);?>">
	        <a target="_blank" href="<?php echo $item->url;?>">
	            <img  src="<?php echo $this->config->show_image_url('advert',$item->picture);?>">
	        </a>
	    </li>
	    <?php endforeach;?>
	</ul>
	<a class="h_pre" href="javascript:;">&lt;</a>
	<a class="h_nxt" href="javascript:;">&gt;</a>
	<p id="hr_a" class="ov">
	    <?php echo $cms_block['head_right_advert'];?>
	</p>
</div>
<?php endif;?>


<?php $this->load->view('layout/footer');?>
