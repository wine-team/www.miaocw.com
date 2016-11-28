<?php
class Test extends MW_Controller
{
    public function _init()
    {
        header("Content-type:text/html;charset=utf-8");
        $this->load->model('region_model', 'region');
    }

    public function index()
    {
        require_once APPPATH.'libraries/phpQuery.php';
        $productUrl = array();
        for ($i=1; $i<=12; $i++) {
            phpQuery::newDocumentFile('http://www.taohv.cn/category.php?top_cat_id=2&page='.$i);
            $items = pq('.plist ul li');
            foreach ($items as $item) {
                $productUrl[] = 'http://www.taohv.cn'.pq($item)->find('.ptupian a')->attr('href');
            }
        }
        if (!empty($productUrl)) {
            foreach ($productUrl as $url) {
                phpQuery::newDocumentFile($url);
                
            }
        }
    }

    public function orderTest($times = 3)
    {
        if ($this->input->get_post('times')) {
            $times = $this->input->get_post('times');
        }
        $order_id = 10000000;
        $data = array(
            'order_id' => $order_id,
            'us'       => 1000099,
            'ut'       => 2010925,
            'as'       => 2,
            'at'       => 1,
            'amount'   => 2010925,
            'step'     => 2,
            'bit_trade'=> 4096,
        );
        $deleteArray = array();
        $timess = microtime(true);
        echo '开始时间：'.$timess.'<br />';
        for ($i=0; $i<$times; $i++) {
            if ($i > 0) {
                $data['order_id'] = $data['order_id']+1;
            }
            $time = microtime(true);
            $isInsert = $this->db->insert('order_profit', $data);
            $time1 = microtime(true);
            $insert_id = $data['order_id'];
            //pr($this->db->last_query());exit;
            if ($isInsert) {
                echo '当前插入ID:'.$insert_id.'成功,插入时间差：('.($time1-$time).')======|||=====';
            }
            
            $deleteArray[] = $insert_id;
            $time2 = microtime(true);
            $this->db->where('order_id', $insert_id);
            $this->db->limit(1);
            $result = $this->db->get('order_profit');
            $time3 = microtime(true);
            if ($result->num_rows() > 0) {
                echo '获取ID为：'.$insert_id.'的数据成功-(查询时间差：'.($time3-$time2).')-（总的时间差：'.($time3-$time).'）<br />';
            } else {
                echo '获取ID为：'.$insert_id.'的数据失败-(查询时间差：'.($time3-$time2).')-（总的时间差：'.($time3-$time).'）<br />';
            }
        }
        if (!empty($deleteArray)) {
            $this->db->where_in('order_id', $deleteArray);
            $isDelete = $this->db->delete('order_profit');
            if ($isDelete) {
                echo '删除ID：'.implode(',', $deleteArray).'成功('.microtime(true).')<br />';
            } else {
                echo '删除ID：'.implode(',', $deleteArray).'失败('.microtime(true).')<br />';
            }
        }
        $endd = microtime(true);
        echo '结束时间：'.$endd.',所有总时间差：'.($endd-$timess).'<br />';
        exit;
    }
    
    public function getRegion()
    {
        $result = $this->region->getChinaRegion(array('region_type'=>2));
        $attr = '[';
        foreach ($result->result() as $item) {
            $attr .= "'".$item->region_name.'|'.$item->region_pinyin.'|'.strtolower($item->region_abbr)."',";
        }
        $attr = rtrim($attr, ',');
        $attr .= ']';
        
        echo $attr;exit;
    }
}