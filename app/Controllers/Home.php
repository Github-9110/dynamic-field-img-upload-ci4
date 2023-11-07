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
 
                $item->move(FCPATH . 'uploads');
                $data = [
                    'name' =>  $item->getClientName(),
                    'image'  => $item->getClientMimeType()
                  ];
                $model = new ImageModel();
                $model->insert($data);

             }
        }
       
    }
}
