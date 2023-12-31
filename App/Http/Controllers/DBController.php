<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use App\Models\ModeratorModel;
use App\Models\ReviewModel;
use App\Models\TempUserModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class DBController extends Controller
{
    public function CreateUser(Request $request)
    {
        $valid = $request->validate([
            'user-name' => 'required',
            'user-email' => 'required',
            'user-password' => 'required|min:4',
            'password-confirmation' => 'required|min:4',
        ]);

        $user = new TempUserModel();

        $user->guid = ReviewsController::GUIDv4();
        $user->email = $request->input('user-email');
        $user->FIO = $request->input('user-name');
        $user->password = $request->input('user-password');

        ReviewsController::SendMail($user->email, $user->FIO, $user->guid);

        $user->save();

        $data = [];
        $data['send_registration'] = $user->email;

        return view('/main', ['data' => $data]);

//        $user = new UserModel();
//
//        $user->email = $request->input('user-email');
//        $user->FIO = $request->input('user-name');
//        $user->password = $request->input('user-password');
//
//        $user->save();
//
//        session(['isUser' => 1]);
//        session(['username' => $request->input('user-name')]);
//        session(['email' => $request->input('user-email')]);
//
//        session(['isUser' => 1]);
//        return view('login');
    }

    public function Logout()
    {
        session(['isUser' => 0]);
        return redirect()->route('main');
    }

    public function Adminlogout()
    {
        session(['isModer' => 0]);
        session(['isAdmin' => 0]);
        return redirect()->route('main');
    }

    public function SigninView()
    {
        return view('signin', ['redirectlink' => URL::previous()]);
    }

    public function Signin(Request $request)
    {
        $valid = $request->validate([
            'user-email' => 'required',
            'user-password' => 'required|min:4',
        ]);
        $useremail = UserModel::select("*")->where("email", $request->input('user-email'));

        if($useremail->exists() && UserModel::select("*")->where("password", $request->input('user-password'))->exists()){
            session(['isUser' => 1]);
            session(['username' => UserModel::find($request->input('user-email'))->FIO]);
            session(['email' => $request->input('user-email')]);
            return Redirect::to($request->input('redirectlink'));
        }
        else
        {
            $valid = $request->validate([
                'user-password' => 'confirmed',
            ]);
        }

        return view('signin');
    }

    public function Register($guid)
    {
        if (is_null($guid))
        {
            return Redirect::to('/');
        }
        $guiduser = TempUserModel::select("*")->where("guid", $guid);
        if($guiduser->exists())
        {
            $user = new UserModel();

            $user->email = TempUserModel::find($guid)->email;
            $user->FIO = TempUserModel::find($guid)->fio;
            $user->password = TempUserModel::find($guid)->password;

            $user->save();

            TempUserModel::where('guid', $guid)->delete();

            session(['isUser' => 1]);
            session(['username' => $user->FIO]);
            session(['email' => $user->email]);

            session(['isUser' => 1]);
            return view('/signin');
        }
        else
        {
            return Redirect::to('/');
        }
    }

    public function Adminsignin(Request $request)
    {
        $valid = $request->validate([
            'user-nickname' => 'required',
            'user-password' => 'required|min:4',
        ]);

        if ($request->input('type_account') == 0)
        {
            $usernickname = ModeratorModel::select("*")->where("nickname", $request->input('user-nickname'));
            if($usernickname->exists() && ModeratorModel::select("*")->where("password", $request->input('user-password'))->exists()){
                session(['isModer' => 1]);
                session(['nickname' => $request->input('user-nickname')]);
            }
        }
        else
        {
            $usernickname = AdminModel::select("*")->where("nickname", $request->input('user-nickname'));
            if($usernickname->exists() && AdminModel::select("*")->where("password", $request->input('user-password'))->exists()){
                session(['isAdmin' => 1]);
                session(['nickname' => $request->input('user-nickname')]);
            }
        }

        return view('adminsignin');
    }

    public function Adminpanel()
    {
        return view('adminpanel');
    }
    public function Moderpanel()
    {
        return view('moderpanel');
    }

    public function ModeratorEditor()
    {
        $data = [];
        if (ModeratorModel::count() == 0)
        {
            return view('moders_editor', ["empty" => 1]);
        }
        $datas = ModeratorModel::all();
        foreach ($datas as $d)
        {
            $data[$d['nickname']] = [
                'nickname' => $d['nickname'],
                'password' => $d['password'],
            ];
        }
        return view('moders_editor', ["data" => $data]);
    }

    public function CreateModerator(Request $request)
    {
        $valid = $request->validate([
            'nickname' => 'required',
            'password' => 'required|min:4',
        ]);

        $user = new ModeratorModel();

        $user->nickname = $request->input('nickname');
        $user->password = $request->input('password');

        $user->save();

        $data = [];
        if (ModeratorModel::count() == 0)
        {
            return view('moders_editor', ["empty" => 1]);
        }
        $datas = ModeratorModel::all();
        foreach ($datas as $d)
        {
            $data[$d['nickname']] = [
                'nickname' => $d['nickname'],
                'password' => $d['password'],
            ];
        }
        return view('moders_editor', ["data" => $data]);
    }

    public function DeleteModerator($moder)
    {
        ModeratorModel::where('nickname', $moder)->delete();

        return redirect()->route('moders_editor');
    }
}
