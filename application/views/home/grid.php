<?php $this->load->view('layout/header');?>
<?php if(count($advert)>0):?>
<div id="focus" class="focus header-advert">
	<ul class="f_ul">
	    <?php foreach ($advert as $key=>$item):?>
	    <li>
	        <a target="_blank" href="<?php echo $item['url'];?>"  alt="妙处网，成人用品">
	            <img  src="<?php echo $this->config->show_image_url('advert',$item['picture']);?>" />
	        </a>
	    </li>
	    <?php endforeach;?>
	</ul>
	<?php if (!empty($cms_block['head_right_advert'])):?>
	<a class="h_pre" href="javascript:;">&lt;</a>
	<a class="h_nxt" href="javascript:;">&gt;</a>
	<p id="hr_a" class="ov">
	    <?php echo $cms_block['head_right_advert'];?>
	</p>
	<?php endif;?>
</div>
<?php endif;?>
<div id="content" class="w home-content">
    
    <?php if (!empty($cms_block['head_hot_keyword'])):?>
    <div class="hlock over mt35">
	    <div class="lk_l left"><p class="ldok">●</p></div>
	    <div class="lk_r left" id="lk_r">
	        <?php echo $cms_block['head_today_recommend'];?>
	    </div>
	</div>
	<?php endif;?>
	
	<?php if (!empty($cms_block['head_recommend_down'])):?>
	<div class="w ov mt35">
		<div class="h_pic" id="h_pic">
		     <?php echo $cms_block['head_recommend_down'];?>
		     <div class="clear"></div>
		</div>
	</div>
	<?php endif;?>
	
	<!--  
	<div class="hotk ov">
		<?php // echo $cms_block['head_hot_keyword']; ?>
	</div>
	-->
	<div class="chosen-box clf condom">
        <?php $this->load->view('home/condom')?>
    </div>
	<div class="chosen-box clf lingeries">
	    <?php $this->load->view('home/lingeries')?>
    </div>
    <div class="chosen-box clf man">
        <?php $this->load->view('home/man')?>
    </div>
    <div class="chosen-box clf woman">
        <?php $this->load->view('home/woman');?>
    </div>
    <div class="chosen-box clf yanshi">
        <?php $this->load->view('home/yanshi');?>
    </div>
    <div class="chosen-box clf lover">
        <?php $this->load->view('home/lover');?>
	</div>
</div>
<div class="hs_t" id="home_top">
	<div class="w">
		<a class="mt5 left">
			<img src="miaow/images/mcw2.png"/>
		</a>
		<div id="search" class="left home-search">
			<form action="<?php echo site_url('goods/search');?>" method="get"  class="ov">
				<input type="text"  name="keyword" autocomplete="off" x-webkit-speech="" class="shl left" placeholder="想凉快吗？点我！" />
				<input type="submit" class="left shr" title="点击搜索" value="搜索">
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php $this->load->view('layout/footer');?>
