<?php

//
// インターネットそろばん学校 管理ツール用レイアウトヘルパ
//

function admin_layout_view($body, $data = array()) {

	$CI = get_instance();

	$layout_data['content_header'] = $CI->load->view('admin/layout/header_view', $data, true);
	$layout_data['content_body']   = $CI->load->view('admin/' . $body, $data, true);
	$layout_data['content_footer'] = $CI->load->view('admin/layout/footer_view', $data, true);

	$CI->load->view('admin/layout/layout_view', $layout_data);
}
