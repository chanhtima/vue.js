<?php

namespace Modules\Content\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApiContentController extends Controller
{

    public function API_getContent(Request $request)
    {
        $o_content = new ContentsController;
        $id = $request->id;
        $resp = $o_content->findContent($id);
        return ['success' => 1, 'code' => 200, 'msg' => 'success', 'resp' => $resp];
    }
    public function API_getContentByCategory(Request $request)
    {
        $o_content = new ContentsController;
        $type = $request->type;
        $category_id = $request->category_id;
        $page = $request->page;
        $length = $request->length;
        $sort = $request->sort;
        $check_start_end = $request->check_start_end;
        $resp = $o_content->getContentByCategory($type,$category_id,$length,$page,$sort,$check_start_end);
        return ['success' => 1, 'code' => 200, 'msg' => 'success', 'resp' => $resp];
    }
    
}
