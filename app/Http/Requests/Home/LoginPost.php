<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class LoginPost extends FormRequest
{
    /**
     * 科研服务登入
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'captcha' => 'required|captcha',
            'uname' => 'required|regex:/^1[3,4,5,7,8,][0-9]{9}$/',
        ];
    }

    // 提醒错误信息
    public function messages()
    {
        return [
          'captcha.captcha' => '验证码错误',
            'uname.regex' => '用户名格式不正确',
          'captcha.required' => '请填写验证码',
        ];
    }


}
