<?php 
	function h_upload($nama, $lokasi, $tipe, $ukuran, $input)
	{
		$CI = & get_instance();
		$config['upload_path'] = './'.$lokasi;
        $config['allowed_types'] = $tipe;
        $config['max_size'] = $ukuran;
        $config['overwrite'] = true;
        $config['file_name'] = $nama;
        $CI->load->library('upload', $config);
		// $CI->upload->initialize($config);
		
		$CI->upload->do_upload($input);
		$res = $CI->upload->data();
		
		return $res['file_name'];
	}
?>