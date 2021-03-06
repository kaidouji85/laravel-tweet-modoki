<?php

namespace App\Http\Controllers;

use App\HtmlForm\LoginForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 独自作成したログインコントローラ
 * 
 * @author Y.Takeuchi
 */
class CustomLoginController extends Controller
{
    /**
     * ログインページを表示する
     *
     * @param Request $request リクエスト
     */
    public function show(Request $request)
    {
        return view('login');
    }

    /**
     * ログイン処理を行う
     *
     * @param Request $request
     */
    public function login(Request $request)
    {
        $form = new LoginForm($request);
        $form->validator()->validate();
        $credentials = $form->authCredentials();
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        
        return redirect('/login')
            ->withInput()
            ->withErrors([
                'error' => 'ログインに失敗しました'
            ]);
    }

    /**
     * ログアウト処理を行う
     *
     * @param Request $request リクエスト
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
