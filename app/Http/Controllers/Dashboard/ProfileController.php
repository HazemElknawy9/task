<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:read_users')->only(['index']);
        // $this->middleware('permission:create_users')->only(['create', 'store']);
        // $this->middleware('permission:update_users')->only(['edit', 'update']);
        // $this->middleware('permission:delete_users')->only(['destroy']);

    }// end of __construct

    public function index()
    {
       
    }//end of index

    public function create()
    {
       

    }//end of create

    public function store(Request $request)
    {
        

    }//end of store

    public function edit(User $user)
    {  
        return view('dashboard.profiles.edit');
    }//end of edit

    public function update(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();
        if ($request->image) {
            $user = User::findOrFail($user->id);
            if ($user->image != 'default.png') {

                Storage::disk('local')->delete('public/profile/' . $user->image);
            }//end of inner if
            $image = Image::make($request->image)
                ->encode('jpg', 50);
            Storage::disk('local')->put('public/profile/' . $request->image->hashName(), (string)$image, 'public');
            $data['image'] = $request->image->hashName();
        }    
        $user->update($data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();
    }//end of update

    public function destroy(User $user)
    {
       

    }//end of destroy

    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];

        $check_password =User::where(['email'=> Auth::user()->email])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            $request->validate([
            'new_pwd' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
          ]);

            $check_password =User::where(['email'=> Auth::user()->email])->first();
            //$check_password = User::where(['admin'=>'1'])->first();
           // echo "<pre>"; print_r($check_password); die;
            $current_password= $data['current_pwd'];
            if (Hash::check($current_password, $check_password->password)) {
                $password=bcrypt($data['new_pwd']);
                User::where('id',$check_password->id)->update(['password'=>$password]);
                session()->flash('success', __('site.updated_successfully'));
                return redirect()->back(); 
            }else{
                session()->flash('error', __('site.updated_failed'));
                return redirect()->back();
            }
        }
    }

}//end of controller
