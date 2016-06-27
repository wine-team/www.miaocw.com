<?php $this->load->view('layout/header');?>
<?php if($advert->num_rows()>0):?>
<div id="focus" class="focus">
	<ul class="f_ul">
	    <?php foreach ($advert->result() as $key=>$item):?>
	    <li>
	        <a target="_blank" href="<?php echo $item->url;?>">
	            <img width="810" height="450" src="<?php echo $this->config->show_image_url('advert',$item->picture);?>">
	        </a>
	    </li>
	    <?php endforeach;?>
	</ul>
	<a class="h_pre" href="javascript:;">&lt;</a>
	<a class="h_nxt" href="javascript:;">&gt;</a>
	<p id="hr_a" class="ov">
	      <a target="_blank" href="topic.php?topic_id=957"><img src="http://s.qw.cc/data/afficheimg/1441780782736853676.jpg" width="190" height="225"></a>
	      <a target="_blank" href="topic/yanghuo/"><img src="http://s.qw.cc/data/afficheimg/1441780806854741534.jpg" width="190" height="225"></a>
	</p>
</div>
<?php endif;?>

<?php $this->load->view('layout/footer');?>
