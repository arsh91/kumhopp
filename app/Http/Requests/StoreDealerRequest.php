<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDealerRequest extends FormRequest
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
            'email' => 'unique:users,email',
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
	
	
	public function messages()
    {
        return [
            'email.required' => 'Email is required!',
			'email.unique' => 'Email already exists, Please try with some other email!'
        ];
    }
}
