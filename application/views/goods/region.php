<?php $region = $this->region->findCityByParentId(1,1);?>
<?php 
	$city = array();
	$area = array();
	$pro = get_cookie('province');
	$ci = get_cookie('city');
	if( empty($pro) && empty($ci) ){
		$localAddress = getIpLookup();
	}
	$localAddress['province'] = $pro ? $pro : $localAddress['province'];
	$localAddress['city'] = $ci ? $ci : $localAddress['city'];
	$cityResult = $this->region->getChildByRegionName($localAddress['province'],1);
	$areaResult = $this->region->getChildByRegionName($localAddress['city'],2);
	$city = $cityResult->num_rows() > 0 ? $cityResult : array();
	$area = $areaResult->num_rows() > 0 ? $areaResult : array();
?>
<div class="pes left" id="pes">
	<p class="pes_id hand">
		<em id="pes_id" class="address"><?php echo $localAddress['city'];?></em>
		<em class="rdop"></em>
	</p>
	<div class="pes_z lh25">
		<ul id="pes_ul" class="region">
			<li class="province on"><?php echo $localAddress['province'] ? $localAddress['province'] : '省份';?></li>
			<li class="city"><?php echo $localAddress['city'] ? $localAddress['city'] : '地级市';?></li>
			<li class="area">区县</li>
		</ul>
		<div id="pes_z">
			<ul id="sel1" class="pes_o p-list">
			    <?php foreach ($region->result() as $val):?>
				<li>
					<a href="javascript:;" region-id="<?php echo $val->region_id;?>" region-type="<?php echo $val->region_type;?>">
						<?php echo $val->region_name;?>
					</a>
				</li>
				<?php endforeach;?>
			</ul>
			<ul id="sel2" class="pes_o hid c-list">
				<?php if(count($city)>0):?>
        		<?php foreach($city->result() as $val):?>
				<li>
					<a href="javascript:;" region-id="<?php echo $val->region_id;?>" region-type="<?php echo $val->region_type;?>">
						<?php echo $val->region_name;?>
					</a>
				</li>
			    <?php endforeach;?>
                <?php endif;?>
			</ul>
			<ul id="sel3" class="pes_o hid a-list">
				<?php if(count($area)>0):?>
        		<?php foreach($area->result() as $val):?>
        		<li>
					<a href="javascript:;" region-id="<?php echo $val->region_id;?>" region-type="<?php echo $val->region_type;?>">
						<?php echo $val->region_name;?>
					</a>
				</li>
			    <?php endforeach;?>
                <?php endif;?>
			</ul>
		</div>
	</div>
</div>
<span class="pl10 c9">运费<em class="cost">0.00</em></span>
<div class="dx_d lh18" id="dx_d">
	<h4 class="red f14">短信订购指南</h4>
	<p>&nbsp;</p>
	<p>用短信编辑以下内容发送到：159-8817-3721</p>
	<p class="red">商品货号#数量#规格#收件人姓名#收件地址</p>
	<p>&nbsp;</p>
	<p class="bg_gray">例如： Q8164#1#白色#张三#北京朝阳区XX路XX小区XX号</p>
	<p>&nbsp;</p>
	<p class="c9">注意：发送前请认真核对好货号信息，如该商品没有规格信息，则不用填写。</p>
</div>
