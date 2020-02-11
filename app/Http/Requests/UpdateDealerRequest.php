<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDealerRequest extends FormRequest
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
            
            'first_name' => 'required',
            'last_name' => 'required',
            'points'=> 'required',
            'account_no'=>'required',
            'contact'=>'required',
            'address1'=>'required',
            'town'=>'required',
            'county'=>'required',
            'post_code'=>'required',
            'region'=>'required',
            'category'=>'required',
            'group'=>'required'
        ];
    }
}
