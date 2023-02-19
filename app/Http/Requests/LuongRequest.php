<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LuongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'MaCaNhan' => 'required',
            'HeSoLuong' => 'required|decimal:0,3'
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'decimal' => ':atribute phải là số trong khoảng :decimal'
        ];
    }

    public function attributes() {
        return [
            'MaCaNhan' => 'Mã cá nhân',
            'HeSoLuong' => 'Hệ số lương'
        ];
    }
}
