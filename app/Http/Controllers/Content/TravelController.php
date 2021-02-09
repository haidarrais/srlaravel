<?php

namespace App\Http\Controllers\Content;
use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['travels'] = Travel::orderBy('id')->paginate(2);
        return view('pages.admin.travel.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel.add');
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
            'travel_code' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            ]);
            if ($files = $request->file('image')) {
                $destinationPath = 'asset/img/'; // upload path
                $travelImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $insert['image'] = "$travelImage";
                $files->move($destinationPath, $travelImage);
            }
            $insert['title'] = $request->get('title');
            $insert['travel_code'] = $request->get('travel_code');
            $insert['expired'] = $request->get('expired');
            $insert['description'] = $request->get('description');
            Travel::insert($insert);
            return FacadesRedirect::to('/admin/travel')
            ->with('success','Great! travel created successfully.');
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
        $data['travel_info'] = Travel::where($where)->first();
        return view('pages.admin.edittraveltion', $data);
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
            'travel_code' => 'required',
            'description' => 'required',
            ]);
            $update = ['title' => $request->title, 'description' => $request->description];
            if ($files = $request->file('image')) {
            $destinationPath = 'asset/img/'; // upload path
            $travelImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $travelImage);
            $update['image'] = "$travelImage";
            }
            $update['title'] = $request->get('title');
            $update['travel_code'] = $request->get('travel_code');
            $update['description'] = $request->get('description');
            Travel::where('id',$id)->update($update);
            return FacadesRedirect::to('/admin/travel')->with('success','Great! travel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = DB::table('travels')->where('id', $id)->first();
        $file= $image->image;
        $filename = 'asset/img/'.$file;
        File::delete($filename);

        Travel::where('id',$id)->delete();
        return FacadesRedirect::to('/admin/travel')->with('success','travel deleted successfully');
    }
}
