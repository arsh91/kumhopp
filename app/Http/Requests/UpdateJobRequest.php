<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
			'customer_name' => 'required',
			'contact_name' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'title' => 'required',
			'description' => 'required',
			'dealer_id'=>'required',
			'target' => 'required'
		];
    }
}