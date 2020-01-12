<?php

//
// インターネットそろばん学校 フロント用レイアウトヘルパ
//

function front_layout_view($body, $data = array()) {

	$CI = get_instance();

    $CI->load->library('user_agent');
    if ($CI->agent->is_smartphone()) {
        $mobile_dir = 'mobile/';
    } else {
        $mobile_dir = '';
    }
	$layout_data['content_header'] = $CI->load->view('front/'.$mobile_dir.'layout_header_view', $data, true);
	$layout_data['content_body']   = $CI->load->view('front/'.$mobile_dir . $body, $data, true);
	$layout_data['content_footer'] = $CI->load->view('front/'.$mobile_dir.'layout_footer_view', $data, true);

	$CI->load->view('front/layout_view', $layout_data);
}
