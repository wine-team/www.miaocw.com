<?php
class Mall_order_product_profit_model extends CI_Model
{
    private $table = 'mall_order_product_profit';
    
    public function insertBatch($postData)
    {
        if (empty($postData)) {
            return false;
        }
        foreach ($postData as $key=>$value) {
            if (empty($value)) {
                return false;
            }
            if(is_array($value)){
                foreach ($value as $v) {
                    if($v['account'] > 0){
                        $data[] = array(
                            'order_product_id' => $key,
                            'uid'              => $v['uid'],
                            'account'          => $v['account'],
                            'account_type'     => $v['account_type'],
                            'as'               => $v['as'],
                        );
                    }
                }
            }
        }
        $result = true;
        if(!empty($data)){
            $result = $this->db->insert_batch($this->table, $data);
        }
        return $result;
    }
    
     /**
     * 插入数据
     * @param unknown $param
     */
    public function insertOrderProfit($param=array()) {
    	
    	return $this->db->insert($this->table,$param);
    }
}