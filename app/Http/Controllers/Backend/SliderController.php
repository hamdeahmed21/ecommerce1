<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::get();
        return view('Backend.slider.index',compact('sliders'));
    }
    public function create(){
        return view('Backend.slider.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'image'=>'required|mimes:jpeg,png'
        ]);
        $image = $request->file('image')->store('public/slider');
        Slider::create([

            'image'=>$image
        ]);
        $notification = array(
            'message' => 'Image uploaded successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy($id){
        Slider::find($id)->delete();
        $notification = array(
            'message' => 'Image deleted successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
