<?php 
class Region extends MW_Controller
{
    public function _init()
    {
        $this->load->model('region_model', 'region');
    }
    
    /**
     * 根据ajax反馈的父id，返回所有子集 （json格式）
     */
    public function select_children($parent_id=0)
    {
        $childrenData = array();
        if ($parent_id) {
            $childrenData = $this->region->children_of($parent_id);
        }
        echo json_encode($childrenData);exit;
    }
    

}