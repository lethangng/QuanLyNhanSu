<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KyLuatRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'KyLuat_id' => 'required|exists:khenthuong,id',
            'ThongTinCaNhan_id' => 'required|exists:thongtincanhan,id',
            'NgayKyLuat' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'date' => ':attribute phải là định dạng ngày tháng'
        ];
    }

    public function attributes()
    {
        return [
            'KyLuat_id' => 'Tên kỷ luật',
            'ThongTinCaNhan_id' => 'Tên nhân viên',
            'NgayKyLuat' => 'Ngày kỷ luật'
        ];
    }
}
