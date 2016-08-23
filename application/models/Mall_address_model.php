 <?php
class Mall_address_model extends CI_Model
{
    private $table   = 'mall_address';
    
     /**
     * 发现地址
     * @param unknown $param
     */
    public function findAddressByRes($param=array()){
    	
    	if(!empty($param['uid'])) {
    		$this->db->where('uid',$param['uid']);
    	}
    	$this->db->order_by('is_default','desc'); // 2为默认  1为非默认
    	return $this->db->get($this->table);
    }
   
    
    
}