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
    
    /**
     *ajax-region
     */
    public function ajaxRegion(){
    	 
    	$parent_id = $this->input->post('parent_id');
    	$region_type = $this->input->post('region_type');
    	$data['region'] = $this->region->findCityByParentId($parent_id,$region_type);
    	echo $data['region']->num_rows() > 0 ? json_encode(array('status'=>true,'html'=>$this->load->view('goods/district',$data,true)))
    	: json_encode(array('status'=>false));exit;
    }

}