<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Image;

class AboutController extends Controller
{
    
    public function AboutPage(){
      $aboutpage = About::find(1);
      return view('admin.about_page.about_page_all',compact('aboutpage'));

    }//end AboutPage method

    public function UpdateAbout(Request $request){
      $about_id = $request->id;
      if($request->file('about_image')){
          $image = $request->file('about_image');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//26428824876.jpg

          Image::make($image)->resize(523,605)->save('upload/home_about/'.$name_gen);
          $save_url= 'upload/home_about/'.$name_gen;

          About::findOrFail($about_id)->update([
            'title'                 => $request->title,
            'short_title'           => $request->short_title,
            'short_description'     => $request->short_description,
            'long_description'      => $request->long_description,
            //'video_url'             => $request->video_url,
            'about_image'           => $save_url,
          ]);


          $notification = array(
            'message' => 'Abour Page Updated With Latest Image Successfully',
            'alert-type' => 'success'
          );
          
          return redirect()->back()->with($notification);
          
        }else{

          About::findOrFail($about_id)->update([
            'title'                 => $request->title,
            'short_title'           => $request->short_title,
            'short_description'     => $request->short_description,
            'long_description'      => $request->long_description,
          ]);


          $notification = array(
            'message' => 'Ubout Page Updated without Image Successfully',
            'alert-type' => 'success'
          );
          
          return redirect()->back()->with($notification);
        }//endelse


    }//end UpdateAbout method


    public function HomeAbout(){
      
      return view('frontend.about_page');
   
    }//end HomeAbout method

}
