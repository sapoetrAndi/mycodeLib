<?php

// upload file di codeigniter
public function uploadBlogOgImage($field){
    $config['upload_path'] = 'assets/blog_og_image';
    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    // $config2['max_size']     = '1000000';
    // $config2['max_width'] = '1024';
    // $config2['max_height'] = '768';
    $this->load->library('upload', $config);
    //$this->upload->initialize($config);//pakai ini apabila library sudah di load

    if (!$this->upload->do_upload($field)) {
        $data['error'] = $this->upload->display_errors();
        if($data['error'] === "<p>You did not select a file to upload.</p>"){
            return false;
        }
    } else {
        $uploaded_data = $this->upload->data();
        print_r($uploaded_data);
        // return $uploaded_data;
        return $uploaded_data['file_name'];
    }
}