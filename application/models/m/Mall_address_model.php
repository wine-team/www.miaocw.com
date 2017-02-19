 <?php
class Mall_address_model extends CI_Model
{
    private $table   = 'mall_address';
    
     /**
     * 发现地址
     * @param unknown $param
     */
    public function findAddressByRes($param=array(),$f='*'){
    	
    	$this->db->select($f);
    	if(!empty($param['uid'])) {
    		$this->db->where('uid',$param['uid']);
    	}
    	$this->db->order_by('is_default','desc'); // 2为默认  1为非默认
    	$this->db->order_by('address_id','desc'); //
    	return $this->db->get($this->table);
    }

     /**
     * 插入
     * @param unknown $param
     */
    public function insert($param) {
    	
       $this->db->insert($this->table,$param);
       return $this->db->insert_id();
    }
    
     /**
     * delete
     */
    public function delete($param=array()) {
    	
    	if (!empty($param['address_id'])) {
    		$this->db->where('address_id',$param['address_id']);
    	}
    	if (!empty($param['uid'])) {
    		$this->db->where('uid',$param['uid']);
    	}
    	return $this->db->delete($this->table);
    }
    
     /**
     * 编辑
     * @param unknown $param
     */
    public function editAddress($param) {
    	
    	if (!empty($param['province_id'])) {
    		$data['province_id'] = $param['province_id'];
    	}
    	if (!empty($param['province_name'])) {
    		$data['province_name'] = $param['province_name'];
    	}
    	if (!empty($param['city_id'])) {
    		$data['city_id'] = $param['city_id'];
    	}
    	if (!empty($param['city_name'])) {
    		$data['city_name'] = $param['city_name'];
    	}
    	if (!empty($param['district_id'])) {
    		$data['district_id'] = $param['district_id'];
    	}
    	if (!empty($param['district_name'])) {
    		$data['district_name'] = $param['district_name'];
    	}
    	if (!empty($param['detailed'])) {
    		$data['detailed'] = $param['detailed'];
    	}
    	if (!empty($param['code'])) {
    		$data['code'] = $param['code'];
    	}
    	if (!empty($param['receiver_name'])) {
    		$data['receiver_name'] = $param['receiver_name'];
    	}
    	if (!empty($param['tel'])) {
    		$data['tel'] = $param['tel'];
    	}
    	if (!empty($param['is_default'])) {
    		$data['is_default'] = $param['is_default'];
    	}
    	if (!empty($param['address_id'])) {
    		$this->db->where('address_id',$param['address_id']);
    	}
    	if (!empty($param['uid'])) {
    		$this->db->where('uid',$param['uid']);
    	}
    	return $this->db->update($this->table,$data);
    }
}