<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterModel;
use App\Models\LoginModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Carbon\Carbon;


class LoginRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=DB::table('register_models')->where('type','customer')->paginate(5);
        return view('/admin/viewcustomer',compact('customers'));
    }
    public function customerprint()
    {
        $customers=DB::table('register_models')->where('type','customer')->get();
        return view('/admin/printcustomer',compact('customers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function logincreate()
    {
        return view('/auth/login');
    }

    public function registercreate()
    {
        return view('/auth/register');
    }

    public function save(Request $request)
    {
        $request->validate([
            'rname'=>'required|regex:/^[A-Za-z\s]+$/',
            'rphone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|unique:register_models',
            'remail'=>'required|email|unique:register_models',
            'raddress'=>'required',
            'rcity'=>'required|regex:/^[A-Za-z\s]+$/',
            'rstate'=>'required|regex:/^[A-Za-z\s]+$/',
            'rpin'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max:6',
            'rpassword'=>'min:5|max:15|required_with:rcpassword|same:rcpassword|',
            'rcpassword'=>'required|min:5|max:15'
        ]);

        $getname=request('rname');
        $getphone=request('rphone');
        $getemail=request('remail');
        $getaddress=request('raddress');
        $getcity=request('rcity');
        $getstate=request('rstate');
        $getpin=request('rpin');
        $getpassword=request('rpassword');

        $register=new RegisterModel();
        $register->rname=$getname;
        $register->rphone=$getphone;
        $register->remail=$getemail;
        $register->raddress=$getaddress;
        $register->rcity=$getcity;
        $register->rstate=$getstate;
        $register->rpin=$getpin;
        $register->rpassword=Hash::make($getpassword);
        $save= $register->save();


        if($save)
        {
            return back()->with ('Success','Registered successfully');
        }
        else
        {
            return back()->with('fail','Something went wrong, try again later');
        }

    }

    public function check(Request $request)
    {
        $request->validate([
            'lemail'=>'required|email',
            'lpassword'=>'required|min:5|max:15'
        ]);

        $userInfo = RegisterModel::where('remail','=',$request->lemail)->first();
        if(!$userInfo)
        {
            return back()-> with ('fail', 'We dont recognize your email');
        }
        else
        {
            //check password
            if(Hash::check($request->lpassword,$userInfo->rpassword))
            {
                if($userInfo->type=='admin')
                {
                $request->session()->put('LoggedUser',$userInfo->id);
                return redirect('/admin/adminhome');
                }
                else
                {
                    $request->session()->put('LoggedUser',$userInfo->id);
                    return redirect('/customer/customerhome');
                }
            }
            else
             {
                return back()-> with ('fail', 'Incorrect Password');
            }
        }
        
    }

    function adminhome(Request $request)
    {
        $data=['LoggedUserInfo'=>RegisterModel::where('id','=',session('LoggedUser'))->first()];
        return view('/admin/adminhome',$data);
    }

    function customerhome(Request $request)
    {
        $data=['LoggedUserInfo'=>RegisterModel::where('id','=',session('LoggedUser'))->first()];
        return view('/customer/customerhome',$data);
    }

    function logout() 
    {
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    static public function todaydate()
    {
        $date=Carbon::now('Asia/Kolkata')->format('d-m-y');
        return $date;
    }
    static public function username()
    {
        $customerid=Session::get('LoggedUser');
        $name=DB::table('register_models')->select('rname')->where('id','=',$customerid)->value('rname');
        return $name;
    }
    public function edit($id)
    {
        $customers=RegisterModel::find($id);
        return view('/customer/editcustomer',compact('customers'));
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
            'rname'=>'required|min:2|max:40|regex:/^[A-Za-z\s]+$/',
            'rphone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'raddress'=>'required',
            'rcity'=>'required|regex:/^[A-Za-z\s]+$/',
            'rstate'=>'required|regex:/^[A-Za-z\s]+$/',
            'rpin'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max:6'
    
        ]);

        $register=RegisterModel::find($id);
        $getname=request('rname');
        $getphone=request('rphone');
        $getaddress=request('raddress');
        $getcity=request('rcity');
        $getstate=request('rstate');
        $getpin=request('rpin');
      
        $register->rname=$getname;
        $register->rphone=$getphone;
        $register->raddress=$getaddress;
        $register->rcity=$getcity;
        $register->rstate=$getstate;
        $register->rpin=$getpin;

        $register->save();

        return back()->with ('Success','Updated Profile successfully');
    }

    public function passwordcreate()
    {
        return view('/customer/updatepassword');
    }
    public function passwordstore(Request $request,$id)
    {      
         $request->validate([
        'rpassword'=>'min:5|max:15|required',
        'newpassword'=>'min:5|max:15|required',
        'cnewpassword'=>'min:5|max:15|required_with:newpassword|same:newpassword|'
    ]);
         $register=RegisterModel::find($id);
         $getoldpassword=request('rpassword');
         $userInfo = RegisterModel::where('id','=',$id)->first();
        if(Hash::check($request->rpassword,$userInfo->rpassword))
        {
            $getpassword=request('newpassword');
            $register->rpassword=Hash::make($getpassword);
            $register->save(); 
            
            return back()->with ('Success','Updated Password successfully');
        }
        else
        {
            return back()-> with ('fail', 'Incorrect Current Password');
        }
          /*  return redirect('/customer/updatepassword')->with('alert', 'Enter the correct current password!');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
