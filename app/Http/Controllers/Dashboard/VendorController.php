<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
  

    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Vendor::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" num="'.$data->name.'" id="'.$data->id.'" class="delete btn btn-danger btn-sm">حذف</button>';
                        return $button;
                    })
                    ->addColumn('user_active_or_not', function($data){
                        if ($data->active == 1) {
                            $button = '<label class="label zoma label-success">مفعل  </label>';
                        }else{
                            $button = '<label class="label zoma label-danger">مجمد  </label>';
                        }
                        return $button;
                    })
                    ->addColumn('inactive', function($data){
                        if ($data->active == 1) {
                            $button = '<div class="actions"><div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-small bootstrap-switch-animate bootstrap-switch-off" style="width: 84px;"><div class="bootstrap-switch-container'.$data->id.'" style="width: 123px; margin-left: 0px;"><span id='.$data->id.' class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 41px;">ON</span><span class="bootstrap-switch-label" style="width: 41px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-warning" id='.$data->id.' style="width: 41px;">OFF</span><input type="checkbox" class="make-switch" checked="" data-on="success" data-on-color="success" data-off-color="warning" data-size="small"></div></div> </div>';
                        }else{
                           $button = '<div class="actions"><div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-small bootstrap-switch-animate bootstrap-switch-off" style="width: 84px;"><div class="bootstrap-switch-container'.$data->id.'" style="width: 123px; margin-left: -41px;"><span id='.$data->id.' class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 41px;">ON</span><span class="bootstrap-switch-label" style="width: 41px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-warning" id='.$data->id.' style="width: 41px;">OFF</span><input type="checkbox" class="make-switch" checked="" data-on="success" data-on-color="success" data-off-color="warning" data-size="small"></div></div> </div>';
                        }
                        return $button;
                    })
                    ->addColumn('checkbox', '<input type="checkbox" name="item[]" class="student_checkbox" value="{{$id}}" />')
                    ->addColumn('active', '<a class="btn btn-success activee" id="{{$id}}" ><i class="fa fa-toggle-on"></i></a>')
                    ->rawColumns(['action','checkbox','active','inactive','user_active_or_not'])
                    ->make(true);
        }           
        
        return view('dashboard.vendors.index');
    }//end of index

    public function create()
    {
       return view('dashboard.vendors.create');

    }//end of create

    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required',
            'phone' => 'required|array|min:1',
            'phone.0' => 'required',
            'address' => 'required',
        ]);
        if ($request->image) {
            $image = Image::make($request->image)
                ->encode('jpg', 50);
            Storage::disk('local')->put('public/vendors_images/' . $request->image->hashName(), (string)$image, 'public');
            $data['image'] = $request->image->hashName();
        }
        $data['phone'] = array_filter($request->phone);
        Vendor::create($data);
       
           
        return response()->json(['success' => 'تمت الاضافة بنجاح']);

    }//end of store

    public function edit($id)
    {  
        if(request()->ajax())
        {
            $data = Vendor::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }//end of edit

    public function update(Request $request)
    {

        $vendor = Vendor::findOrFail($request->hidden_id);
        $data = $request->all();
        $request->validate([
            'name' => 'required',
            'phone' => 'required|array|min:1',
            'phone.0' => 'required',
            'address' => 'required',
        ]);
        
        $image = $request->file('image');
        if ($vendor->image != '' && $image != '') {
            if ($vendor->image != 'default.png') {

                Storage::disk('local')->delete('public/vendors_images/' . $vendor->image);
            }//end of inner if
            $image = Image::make($request->image)
                ->encode('jpg', 50);
            Storage::disk('local')->put('public/vendors_images/' . $request->image->hashName(), (string)$image, 'public');
            $data['image'] = $request->image->hashName();
            $data = array(
                'name' =>   $request->name,
                'phone' =>  array_filter($request->phone),
                'address' =>   $request->address,
                'image'         => $data['image']
            );
        }else{
            $data = array(
                'name' =>   $request->name,
                'phone' =>  array_filter($request->phone),
                'address' =>   $request->address,
            );
        }
        Vendor::whereId($request->hidden_id)->update($data);

        return response()->json(['success' => 'تم التعديل بنجاح']);

    }//end of update

    public function destroy($id)
    {
        $data = Vendor::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'تم حذف البيانات بنجاح']);
    }//end of destroy

    public function destroyAll(Request $request)
    {
        $category_id_array = $request->input('id');
        $category = Vendor::whereIn('id', $category_id_array);
        if($category->delete())
        {
            return response()->json(['success' => 'تم حذف البيانات بنجاح']);
        }
    }

    public function vendorActive($status,$id)
    {
        $category =Vendor::find($id);
        $category->active = $status;
        $category->save();
        if ($status == 1) {
            return response()->json(['success' => 'تم تفعيل الحساب']);
        }else{
            return response()->json(['success' => 'تم تجميد الحساب']);
        }
    }

   
}//end of controller
