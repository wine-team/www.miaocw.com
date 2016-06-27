<?php
class Advert_model extends CI_Model
{
    private $table = 'advert';
    
     /**
     * 获取幻灯片广告
     * @param unknown $flag
     */
    public function findBySourceState($source_state)
    {
        $this->db->where('source_state', $source_state);
        $this->db->where('flag',1);
        $this->db->order_by('sort','asc');
        return $this->db->get($this->table);
    }
}