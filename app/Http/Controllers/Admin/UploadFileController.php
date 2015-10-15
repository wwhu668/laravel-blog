<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use EndaEditor;
use App\Http\Controllers\Controller;

class UploadFileController extends Controller
{
    /**
     * postImg 
     * 
     * @access public
     * @return void
     */
    public function postImg()
    {
        $data = EndaEditor::uploadImgFile('uploads');
        return json_encode($data);
    }
}
