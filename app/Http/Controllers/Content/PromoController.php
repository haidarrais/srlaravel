<?php

namespace App\Http\Controllers\Content;
use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['promos'] = Promo::orderBy('id')->paginate(5);
        return view('pages.admin.promo.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.promo.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'promo_code' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            ]);
            if ($files = $request->file('image')) {
                $destinationPath = 'asset/img/'; // upload path
                $promoImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $insert['image'] = "$promoImage";
                $files->move($destinationPath, $promoImage);
            }
            $insert['title'] = $request->get('title');
            $insert['promo_code'] = $request->get('promo_code');
            $insert['expired'] = $request->get('expired');
            $insert['description'] = $request->get('description');
            Promo::insert($insert);
            return FacadesRedirect::to('/admin/promo')
            ->with('success','Great! Promo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['promo_info'] = Promo::where($where)->first();
        return view('pages.admin.editpromotion', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'promo_code' => 'required',
            'description' => 'required',
            ]);
            $update = ['title' => $request->title, 'description' => $request->description];
            if ($files = $request->file('image')) {
            $destinationPath = 'asset/img/'; // upload path
            $promoImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $promoImage);
            $update['image'] = "$promoImage";
            }
            $update['title'] = $request->get('title');
            $update['promo_code'] = $request->get('promo_code');
            $update['description'] = $request->get('description');
            Promo::where('id',$id)->update($update);
            return FacadesRedirect::to('/admin/promo')->with('success','Great! Promo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = DB::table('promos')->where('id', $id)->first();
        $file= $image->image;
        $filename = 'asset/img/'.$file;
        File::delete($filename);

        Promo::where('id',$id)->delete();
        return FacadesRedirect::to('/admin/promo')->with('success','Promo deleted successfully');
    }
}
