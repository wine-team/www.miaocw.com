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
			<li class="province on">省份</li>
			<li class="city">地级市</li>
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
<span class="pl10 c9">预计<em id="yuji">5月6日(周五)</em>送达</span>
