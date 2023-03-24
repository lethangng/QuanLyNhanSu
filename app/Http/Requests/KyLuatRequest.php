<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
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
            'manv' => 'required|exists:nhanvien,id',
            'ngaykyluat' => 'required|date|before_or_equal:today',
            'lydo' => 'required|not_in:@,#,$,%,^,&,*,(,),_,+',
            'upfile' => 'mimes:png,jpg,jpeg,doc,docx,pdf|max:10024',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'ngaykyluat.date' => ':attribute phải là định dạng ngày tháng',
            'ngaykyluat.before_or_equal' => ':attribute phải trước hoặc bằng hôm nay',
            'exists' => ':attribute không tồn tại.',
            'upfile.max' => ':attribute phải nhỏ hơn 10 MB',
            'upfile.mimes' => ':attribute phải có đuôi png, jpg, doc, docx hoặc pdf',
            'lydo.not_in' => ':attribute không được chứa các ký tự đặc biệt',
        ];
    }

    public function attributes()
    {
        return [
            'manv' => 'Mã nhân viên',
            'ngaykyluat' => 'Ngày kỷ luật',
            'lydo' => 'Lý do',
            'upfile' => 'File'
        ];
    }
    protected function failedValidation(Validator $validator) {
        if ($this->ajax()){
            throw new HttpResponseException(response()->json(['error' => $validator->errors()]));
        } 
        // else{
        //     throw (new ValidationException($validator))
        //                     ->errorBag($this->errorBag)
        //                     ->redirectTo($this->getRedirectUrl());
        // }
    }
}
