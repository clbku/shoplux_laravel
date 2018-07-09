<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Comment;
use App\Company;
use App\Customer;
use App\News;
use App\Product;
use App\Category;
use App\ProductImage;
use App\Slide;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    public function getIndex() {
        return view('admin.home.index');
    }




    // news
//    public function getNewsList() {
//        $news = News::paginate(20);
//        return view('admin.news.list', compact('news'));
//    }
//    public function getAddNews(){
//        return view('admin.news.add');
//    }
//    public function postAddNews(Request $request) {
//        $news = new News();
//        $news->title = $request->title;
//        $news->content = $request->news_content;
//        $news->detail = $request->detail;
//        $image = $request->image;
//        $news->image = $image->move('upload/news/', $image->getClientOriginalName());
//        $news->save();
//        return redirect()->route('admin.news.list')->with('success', 'Thêm tin tức mới thành công');
//    }
//    public function getEditNews($id) {
//        $news = News::find($id);
//        return view('admin.news.edit', compact('news'));
//    }
//    public function postEditNews($id, Request $request) {
//        $news = News::find($id);
//        $news->title = $request->title;
//        $news->content = $request->news_content;
//        $news->detail = $request->detail;
//
//        if ($request->image) {
//            if(file_exists($news->image)) unlink($news->image);
//            $image = $request->image;
//            $news->image = $image->move('upload/news/', $image->getClientOriginalName());
//        }
//        $news->save();
//        return redirect()->route('admin.news.list')->with('success', 'Sửa tin tức thành công');
//    }
//    public function getDeleteNews($id) {
//        $news = News::find($id);
//        if (file_exists($news->image)) unlink($news->image);
//        $comments = Comment::where('post_id', $id)->get();
//        foreach ($comments as $c) {
//            Comment::find($c->id)->delete();
//        }
//        $news->delete();
//        return redirect()->route('admin.news.list')->with('success', 'Xoá tin tức thành công');
//    }
//    public function postFindNews(Request $request) {
//        $news = DB::table('news')
//            ->where('title', 'like', '%' . $request->keyword . '%')
//            ->orWhere('content', 'like', '%' . $request->keyword . '%')
//            ->orWhere('detail', 'like', '%' . $request->keyword . '%')
//            ->get();
//        return view('admin.news.list', compact('news'));
//    }
    //end news
}
