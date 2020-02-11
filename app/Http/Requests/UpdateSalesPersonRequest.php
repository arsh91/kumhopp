<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalesPersonRequest extends FormRequest
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
            'dealer_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required'
        ];
    }
	
	
	public function messages()
    {
        return [
            'dealer_id.required' => 'Please select atleast one dealer!',
        ];
    }
}
