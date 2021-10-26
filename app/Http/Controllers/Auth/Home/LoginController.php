<?php
class LoginController extends Controller
{

    /**
     * 科研服务,密码登入
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'captcha' => ['required', 'captcha'],
        ], [
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '请输入正确的验证码',
        ]);
    }

}
