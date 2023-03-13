<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class HopDongRequest extends FormRequest
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
            'manv' => 'required|exists:nhanvien,id',
            'ngaybatdau' => 'required|date',
            'upfile' => 'mimes:png,jpg,jpeg,doc,docx,pdf|max:10024',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'date' => ':attribute phải là định dạng ngày tháng',
            'upfile.max' => ':attribute phải nhỏ hơn 10 MB',
            'upfile.mimes' => ':attribute phải có đuôi png, jpg, jpeg, doc, docx hoặc pdf'
        ];
    }
    public function attributes()
    {
        return [
            'manv' => 'Mã nhân viên',
            'ngaybatdau' => 'Ngày bắt đầu',
            'ngayketthuc' => 'Ngày kết thúc',
            'upfile' => 'File'
        ];
    }

    protected function failedValidation(Validator $validator) {
        if ($this->ajax()){
            throw new HttpResponseException(response()->json(['error' => $validator->errors()]));
        } else{
            throw (new ValidationException($validator))
                            ->errorBag($this->errorBag)
                            ->redirectTo($this->getRedirectUrl());
        }
    }
}
