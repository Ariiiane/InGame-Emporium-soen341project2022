<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Product;
  
class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload()
    {
        return view('fileUpload');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'AdImage' => 'required|mimes:jpeg,png|max:10280',
        ]);
        $file = $request->file('AdImage')->getClientOriginalName();  
   
        $request->AdImage->move(public_path('images/Ads/'), $file);

        if ($request->user()) {
            Ad::create([
                'seller_id' => $request->user()->id,
                'ad_link' => 'browsing/item/'.$request['product_id'],
                'ad_image_path' => 'images/Ads/'.$file,
            ]);
        }
        return view('seller');
    }
}