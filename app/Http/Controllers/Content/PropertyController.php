<?php

namespace App\Http\Controllers\Content;
use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['property'] = Property::orderBy('id')->paginate(2);
        return view('pages.admin.property.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.property.add');
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
            'property_code' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            ]);
            if ($files = $request->file('image')) {
                $destinationPath = 'asset/img/'; // upload path
                $propertyImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $insert['image'] = "$propertyImage";
                $files->move($destinationPath, $propertyImage);
            }
            $formattedPrice = number_format($request->get('price'), 2, ',', '.');
            $insert['title'] = $request->get('title');
            $insert['price'] = (string)$formattedPrice;
            $insert['property_code'] = $request->get('property_code');
            $insert['expired'] = $request->get('expired');
            $insert['description'] = $request->get('description');
            Property::insert($insert);
            return FacadesRedirect::to('/admin/property')
            ->with('success','Great! property created successfully.');
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
        $data['property_info'] = Property::where($where)->first();
        return view('pages.admin.editpropertytion', $data);
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
            'property_code' => 'required',
            'description' => 'required',
            ]);
            $update = ['title' => $request->title, 'description' => $request->description];
            if ($files = $request->file('image')) {
            $destinationPath = 'asset/img/'; // upload path
            $propertyImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $propertyImage);
            $update['image'] = "$propertyImage";
            }
            $update['title'] = $request->get('title');
            $update['property_code'] = $request->get('property_code');
            $update['description'] = $request->get('description');
            Property::where('id',$id)->update($update);
            return FacadesRedirect::to('/admin/property')->with('success','Great! property updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = DB::table('property')->where('id', $id)->first();
        $file= $image->image;
        $filename = 'asset/img/'.$file;
        File::delete($filename);

        Property::where('id',$id)->delete();
        return FacadesRedirect::to('/admin/property')->with('success','property deleted successfully');
    }
}
