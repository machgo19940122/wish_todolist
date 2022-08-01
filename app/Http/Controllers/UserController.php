<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail; //メール
use App\Mail\RegisterMail; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    //会員登録
    public function postSignup(Request $request){  
        // バリデーション
        $this->validate($request,[
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
        ]);

        // DBインサート
        $user = new User([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password'))
        ]);

        // 保存
        $user->save();
        $name = $request->input('name');
        // リダイレクト
        Mail::send(new RegisterMail($name));
        return redirect()->route('login');
    }

//ログイン機能
        public function postSignin(Request $request)
        { 
            //ログインエラー変数定義
            $login_error=null;
        //idが同じレコードをuser tableからgetする
            $user = User::where('email', $request->email)->get();

        //１件もなければエラー
        if (count($user) === 0){
            $login_error=false;
            return view('user/login', ['login_error' => $login_error]);
        }

        // 一致したら
        if (Hash::check($request->password, $user[0]->password)) {  
            Session::put("id",$user[0]->id);
            Session::put("name",$user[0]->name);
            Session::put("email",$user[0]->email);
            //トップ画面に遷移
            return redirect()->route('top');
        // 不一致だったらエラー 
        }else{
            $login_error=false;
            return view('user/login', ['login_error' => $login_error]);
        } 
        }

 //ログアウト機能
    public function logout(Request $request)
    {
        $request->session()->flush();
        Session::flash('flash_message', 'ログアウトしました');
        return redirect()->route('login');
    }  

//会員情報編集ページの表示
    public function get_edit_member (int $id){
        $user = User::find($id);
        return view('user/edit_member', [
          'user'=>$user,
        ]);
      }

//会員情報の編集
public function edit_member(Request $request,int $id){  
    //バリデーション
    $validated=$request->validate([
        'user_email' => 'required',
        'user_name' => 'required|max:100',
    ]);

    $user = User::find($id);
    //パスワード変更がない場合
    if ($request->user_password == '') {
        $user->email = $request->user_email;
        $user->name = $request->user_name;
        //再度hash化せず、そのまま保存
        $user->password = $user->password;
        $user->save();
    }else{
    //パスワード変更がある場合
        $user->email = $request->user_email;
        $user->name = $request->user_name;
        //新たに入力のあったパスワードをhash化して保存
        $user->password = bcrypt($request->input('user_password'));
        $user->save(); 
    }
    //edit_memberに画面遷移
    $request->session()->flush();
    Session::put("id",$user->id);
    Session::put("name",$user->name);
    Session::put("email",$user->email);
    Session::flash('flash_message3', '会員情報を編集しました');
    
    return redirect()->route('edit_member',$user->id);
   
}


}
