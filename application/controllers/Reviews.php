 <?php
class Reviews extends MW_Controller
{
    public function _init()
    {
        $this->load->helper('common');
        $this->load->library('pagination');
        $this->load->model('mall_order_reviews_model', 'mall_order_reviews');
    }

     /**
     * 评论
     * @param number $pg
     */
    public function getReviews($pg=1) {
    	
        $page_num = 20;
        $num = ($pg - 1) * $page_num;
        $total = $this->mall_order_reviews->total($this->input->get());
        $config['per_page'] = 20;
        $config['first_url'] = base_url('reviews/getReviews').$this->pageGetParam($this->input->get());
        $config['suffix'] = $this->pageGetParam($this->input->get());
        $config['base_url'] = base_url('reviews/getReviews');
        $config['total_rows'] = $total;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $data['pg_list'] = $this->pagination->create_links();
        $data['page_list'] = $this->mall_order_reviews->page_list($page_num, $num, $this->input->get());
        $data['all_rows'] = $config['total_rows'];
        echo json_encode(array(
            'status' => true,
            'html'   => $this->load->view('goods/reviews', $data, true)
        ));exit;
    }
}