<?php
    /**
     * @name api接口
     * @param unknown_type $method 访问的方法名
     * @param unknown_type $apiParas 参数
     * @param unknown_type $ishttps true表示是https，false表示是http
     */
    function getApiDynamic($apiParas, $url, $header = '')
    {
        return apiCurl($apiParas, $url, $header);
    }

    function apiCurl($curlPost, $url, $header = '')
    {
        // 初始化一个 cURL 对象
        $ch = curl_init();
        if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == 'https') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//https请求，不验证证书
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//https请求，不验证hosts
        }
        // 设置你需要抓取的URL
        curl_setopt($ch, CURLOPT_URL, $url);
        // 设置header
        curl_setopt($ch, CURLOPT_HEADER, 0);
        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        // 设置cURL参数，要求结果保存到字符串中还是输出到屏幕上。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        // post提交
        curl_setopt($ch, CURLOPT_POST, 1);
        //post参数设置
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        // 运行cURL，请求网页
        $data = curl_exec($ch);
        // 关闭URL请求
        curl_close($ch);

        return $data;
    } 