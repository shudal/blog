<?php
namespace app\index\behavior;
use app\common\model\Page;

class Newpage{
  public function run($params){
    if($params['command']=='pages'){
      return Page::all();
    }
    else if($params['command']=='readPage'){
      $readPage = Page::get($params['id']);
      $readPage =$readPage->content;

      return $readPage;
    }
    else if($params['command']=='admin_entry'){
      return Page::all();
    }
    else if($params['command']=='delete_newPage'){
      $newPage = Page::get($params['id']);
      $newPage->delete();
      return '页面已删除';
    }
    else if($params['command']=='create_newPage'){
      $newPage = New Page;
      $newPage->name = $params['title'];
      $newPage->content = $params['content'];
      $newPage->save();
      return '新增页面成功';
    }
  }
}
