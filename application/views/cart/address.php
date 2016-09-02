<?php
    $provinces = $this->region->children_of(1);
    $province_selected = isset($province_id) ? (int)$province_id : 0;
    $city_selected     = isset($city_id) ? (int)$city_id : 0;
    $district_selected = isset($district_id) ? (int)$district_id : 0;
?>

<script type="text/javascript">
$(document).ready(function() {
    var province_selected = <?php echo $province_selected;?>;
    var city_selected     = <?php echo $city_selected;?>;
    var district_selected = <?php echo $district_selected;?>;
    var change_city = function(){
        $.ajax({
            url: '<?php echo base_url();?>Region/select_children/'+$('#province_id').val(),
            type: 'GET',
            dataType: 'json',
            success: function(city_json){
                var city = document.getElementById('city_id');
                city.options.length = 0;
                city.options[0] = new Option('城市', '');
                for (var i=0; i<city_json.length; i++) {
                    var len = city.length;
                    city.options[len] = new Option(city_json[i].region_name, city_json[i].region_id); 
                    if (city.options[len].value == city_selected) {
                        city.options[len].selected = true;
                    }
                }
                change_district();//重置地区
            }
        });
    }

    change_city();//初始化城市

    $('#province_id').change(function(){
        change_city();
    });

    var change_district = function(){
        $.ajax({
            url: '<?php echo base_url()?>Region/select_children/'+$('#city_id').val(),
            type: 'GET',
            dataType: 'json',
            success: function(district_json){
                var district = document.getElementById('district_id');
                district.options.length = 0;
                district.options[0] = new Option('县/区', '');
                for (var i=0; i<district_json.length; i++) {
                    var len = district.length;
                    district.options[len] = new Option(district_json[i].region_name, district_json[i].region_id); 
                    if (district.options[len].value == district_selected){
                        district.options[len].selected = true;
                    }
                }
            }
        });
    }

    $('#city_id').change(function(){
        change_district();
    });
});
</script>

<select name="province_id"  id="province_id"  class="left select mt5 required">
    <option value="" >省份</option>
    <?php foreach($provinces as $key => $province): ?>
    <option value="<?php echo $province['region_id'];?>" <?php if ($province['region_id'] == $province_selected):?>selected="selected"<?php endif;?>  province="<?php echo $province['region_name'];?>"><?php echo $province['region_name']; ?></option>
    <?php endforeach; ?>
</select>
<select name="city_id" id="city_id"  class="left select mt5 required">
     <option value="">城市</option>
</select>
<select name="district_id" id="district_id" class="left select mt5 required">
     <option value="">县/区</option>
</select>

