<?php

namespace App\Http\Controllers\Content;
use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['investments'] = Investment::orderBy('id')->paginate(5);
        return view('pages.admin.investment.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.investment.add');
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
            'investment_code' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            ]);
            if ($files = $request->file('image')) {
                $destinationPath = 'asset/img/'; // upload path
                $investmentImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $insert['image'] = "$investmentImage";
                $files->move($destinationPath, $investmentImage);
            }
            $insert['title'] = $request->get('title');
            $insert['investment_code'] = $request->get('investment_code');
            $insert['description'] = $request->get('description');
            Investment::insert($insert);
            return FacadesRedirect::to('/admin/investment')
            ->with('success','Great! investment created successfully.');
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
        $data['investment_info'] = Investment::where($where)->first();
        return view('pages.admin.editinvestmenttion', $data);
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
            'investment_code' => 'required',
            'description' => 'required',
            ]);
            $update = ['title' => $request->title, 'description' => $request->description];
            if ($files = $request->file('image')) {
            $destinationPath = 'asset/img/'; // upload path
            $investmentImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $investmentImage);
            $update['image'] = "$investmentImage";
            }
            $update['title'] = $request->get('title');
            $update['investment_code'] = $request->get('investment_code');
            $update['description'] = $request->get('description');
            Investment::where('id',$id)->update($update);
            return FacadesRedirect::to('/admin/investment')->with('success','Great! investment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = DB::table('investments')->where('id', $id)->first();
        $file= $image->image;
        $filename = 'asset/img/'.$file;
        File::delete($filename);

        Investment::where('id',$id)->delete();
        return FacadesRedirect::to('/admin/investment')->with('success','investment deleted successfully');
    }
}
