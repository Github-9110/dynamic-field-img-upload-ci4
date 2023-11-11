<?php

namespace App\Controllers;
use App\Models\ImageModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('file-views');
    }

    public function upload_image(){
       
        if (is_array($_FILES)) {
            foreach($this->request->getFileMultiple('file') as $item)
             {   
               
                $imgname = str_replace(' ', '_', $item->getClientName());
                $item->move(FCPATH . 'uploads');
                $data = [
                    'name' =>  "null",
                    'image'  =>$imgname
                  ];
                 
                $model = new ImageModel();
                $model->insert($data);

             } 
        } 
    }
    public function slider(){
        return view('slider');
        }
    public function footer_slider(){
        $model = new ImageModel();
        $sliders = $model->findAll();
        return  $this->response->setJSON([
            'footers' => $sliders,
        ]);
      }

    
}
