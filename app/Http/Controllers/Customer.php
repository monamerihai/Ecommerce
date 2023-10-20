<?php

namespace App\Http\Controllers;
// 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\EmailVerification;
use Auth;
use Mail;

class Customer extends Controller
{
    //
    function login(){
        return view('website.login');
    }

    function registration(){
        return view('website.registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
            

        ]);

    $verified = User::where('is_verified',1)->select('is_verified')->first();
    //  dd($verified->is_verified);

    $credentials = [
        'email' => $request->email,
        'password' => $request->password,
        'user_status' => 1,
    ];

        
        if(Auth::attempt($credentials) && $verified->is_verified != 0 ){
            return redirect()->intended(route('website.index'));
        }else{
            return redirect(route('website.login'))->with("error","Login details are not valid");
        }
       

    }

    function registrationPost(request $request){
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' =>'string|required|confirmed|min:6'
            

            
                ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_status = $request->user_status;
        $user->save();

        return redirect("/website/verification/".$user->id);
    }
    public function sendOtp($user)
    {
        $otp = rand(100000,999999);
        $time = time();

        EmailVerification::updateOrCreate(
            ['email' => $user->email],
            [
            'email' => $user->email,
            'otp' => $otp,
            'created_at' => $time
            ]
        );

        $data['email'] = $user->email;
        $data['title'] = 'Mail Verification';

        $data['body'] = 'Your OTP is:- '.$otp;

        Mail::send('website.mailVerification',['data'=>$data],function($message) use ($data){
            $message->to($data['email'])->subject($data['title']);
        });
    }

    function logout(){
        
        Auth::logout();
        return redirect(route('website.index'));
    }

    public function profileUpdate(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'nullable|integer', 
            'phoneno' => 'nullable|string', 
            'address' => 'nullable|string', 
            'image' => 'nullable|image|mimes:jpg,gif,svg,png', 
        ]);
    
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->age = $request->input('age');
        $user->email = $request->input('email');
        $user->phoneno = $request->input('phoneno');
        $user->address = $request->input('address');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('users'), $image_name);
            $path = "/users/" . $image_name;
            $user->image = $path;
        }
    
        $user->save();
    
        return back()->with('message', 'Profile Updated');
    }


    // password
    public function changePassword(){
        return view('website.password');
    }
    public function updatePassword(Request $request){
        $validateData=$request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required',
            'confirmpassword'=>'required|same:newpassword',
        ]);


        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password= bcrypt($request->newpassword);
            $user->save();

            session()->flash('message','Password Updated Successfully');
            return  redirect()->back();

        } else{
            session()->flash('message','Old Password is not match');
            return redirect()->back();
        }
        
    }    public function verification($id)
    {
        $user = User::where('id',$id)->first();
        if(!$user || $user->is_verified == 1 && $user->user_status == 1){
            return redirect('/website/login');
        }
        $email = $user->email;

        $this->sendOtp($user);//OTP SEND

        return view('website.verification',compact('email'));
    }

    public function verifiedOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('otp',$request->otp)->first();
        if(!$otpData){
            return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
        }
        else{

            $currentTime = time();
            $time = $otpData->created_at;

            if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
                User::where('id',$user->id)->update([
                    'is_verified' => 1
                ]);
                return response()->json(['success' => true,'msg'=> 'Mail has been verified']);
            }
            else{
                return response()->json(['success' => false,'msg'=> 'Your OTP has been Expired']);
            }

        }
    }

    public function resendOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('email',$request->email)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
            return response()->json(['success' => false,'msg'=> 'Please try after some time']);
        }
        else{

            $this->sendOtp($user);//OTP SEND
            return response()->json(['success' => true,'msg'=> 'OTP has been sent']);
        }

    }
}


