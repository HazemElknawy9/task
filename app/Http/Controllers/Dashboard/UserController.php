<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use App\Role;
use App\RoleSite;
use App\Crud;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        //create read update delete
        // $this->middleware(['permission:read_users'])->only('index');
        // $this->middleware(['permission:create_users'])->only('create');
        // $this->middleware(['permission:update_users'])->only('edit');
        // $this->middleware(['permission:delete_users'])->only('destroy');

    }//end of constructor

    public function index(Request $request)
    {
        
        if(request()->ajax())
        {
            return datatables()->of(User::whereRoleNot('super_admin')->latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<a href="'.\URL::current().'/'.$data->id.'/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" num="'.$data->name.'"  name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                        $button .= '<button type="button" num="'.$data->name.'"  name="delete" id="'.$data->id.'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button>';
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
        $roles = Role::whereRoleNot('super_admin')->get();
        $users = User::whereRoleNot('super_admin')
            ->whenSearch(request()->search)
            ->whenRole(request()->role_id)
            ->with('roles')
            ->paginate(5);    
        $rolesites = RoleSite::all();
        return view('dashboard.users.index', compact('roles', 'users','rolesites'));

    }//end of index

    public function create()
    {
        $roles = Role::whereRoleNot(['super_admin'])->get();
        $rolesites = RoleSite::all();
        $cruds = Crud::all();
        return view('dashboard.users.create', compact('roles','rolesites','cruds'));

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'permissions' => 'required|min:1',
            'roles' => 'required',
        ]);
        $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
        $request_data['password'] = bcrypt($request->password);
        if ($request->image) {
            $image = Image::make($request->image)
                ->encode('jpg', 50);
            Storage::disk('local')->put('public/profile/' . $request->image->hashName(), (string)$image, 'public');
            $request_data['image'] = $request->image->hashName();
        }
        $user = User::create($request_data);
        $user->attachRole($request_data['roles']);
        $user->syncPermissions($request->permissions);
        
        return response(['status'=>true,'message'=>trans('site.added_successfully')],200);
    }//end of store

    public function edit(User $user)
    {
        $roles = Role::whereRoleNot(['super_admin'])->get();
        $rolesites = RoleSite::all();
        $cruds = Crud::all();
        return view('dashboard.users.edit', compact('user', 'roles','rolesites','cruds'));
    }//end of edit  

    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'permissions' => 'required|min:1',
            'roles' => 'required',
        ]);
        if ($request->image) {
            if ($user->image != 'default.png') {

                Storage::disk('local')->delete('public/profile/' . $user->image);
            }//end of inner if
            $image = Image::make($request->image)
                ->encode('jpg', 50);
            Storage::disk('local')->put('public/profile/' . $request->image->hashName(), (string)$image, 'public');
            $data['image'] = $request->image->hashName();
        }
        $user->update($data);
        $user->syncRoles([$request->roles, $request->roles]);
        //$user->syncRoles([$admin->id, $owner->id]);
        $user->syncPermissions($request->permissions);
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('dashboard.users.index');
 
    }//end of update

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        // DB::table('permission_user')->where('user_id',$data->id)->delete();
        // DB::table('role_user')->where('user_id',$data->id)->delete();
        $data->delete();
        return response()->json(['success' => 'تم حذف البيانات بنجاح']);
    }//end of destroy

    function massremove(Request $request)
    {
        $student_id_array = $request->input('id');
        $student = User::whereIn('id', $student_id_array);
        // DB::table('permission_user')->whereIn('user_id',$student_id_array)->delete();
        // DB::table('role_user')->whereIn('user_id',$student_id_array)->delete();
        if($student->delete())
        {
            return response()->json(['success' => 'تم حذف البيانات بنجاح']);
        }
    }

    public function userActive($status,$id)
    {
        $user =User::find($id);
        $user->active = $status;
        $user->save();
        if ($status == 1) {
            return response()->json(['success' => 'تم تفعيل الحساب']);
        }else{
            return response()->json(['success' => 'تم تجميد الحساب']);
        }
    }

}//end of controller
