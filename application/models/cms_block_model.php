<?php
class Cms_block_model extends CI_Model
{
    private $table = 'cms_block';
    
     /**
     * block_id 
     * @param unknown $blockIds
     * @return multitype:
     */
    public function findByBlockIds($blockIds=array())
    {
    	$this->db->where_in('block_id', $blockIds);
    	$result = $this->db->get($this->table);
    	if ($result->num_rows() > 0) {
    		foreach ($result->result() as $item) {
    			$cmsBlock[$item->block_id] = $item->description;
    		}
    	} else {
    		$cmsBlock = array_combine($blockIds, $blockIds);
    	}
    	return $cmsBlock;
    }
}