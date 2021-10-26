<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'password' => 'required|regex:/^[\w]{6,15}$/',
            'repassword' => 'required|same:password',
            'permission' => 'required',
            'phone' => 'required|regex:/^[1]([3-9])[0-9]{9}$/',
        ];
    }

    // 提醒错误信息
    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'permission.required' => '您是不是忘记选择权限了',
            'repassword.required' => '密码不能为空',
            'password.regex' => '密码不能少于6-15位',
            'password.required' => '确认密码不能为空',
            'repassword.same' => '俩次密码不一致',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机号格式不正确',
        ];
    }
}
