<?php

namespace App\Http\Controllers\Admin;

use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    public function getSlideList() {
        $slide = Slide::all();
        return view('admin.slide.list', compact('slide'));
    }
    public function postAddSlide(Request $request) {
        $slide = new Slide();
        $image = $request->slide;
        $image->move('upload/slide/' , $image->getClientOriginalName());
        $slide->image = 'upload/slide/' . $image->getClientOriginalName();
        $slide->save();
        return redirect()->route('admin.slide.list')->with('success', 'Thêm thành công');
    }
    public function getDeleteSlide($id) {
        Slide::find($id)->delete();
        return redirect()->route('admin.slide.list')->with('success', 'Xóa thành công');
    }
}
