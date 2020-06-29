<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LetterStoreRequest extends FormRequest
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
            'address.city'        => ['string', 'max:150', 'required'],
            'address.street'      => ['string', 'nullable'],
            'address.postal_code' => ['string', 'required'],

            'person.lastname'     => ['string', 'required', 'max:255'],
            'person.firstname'    => ['string', 'required', 'max:255'],
            'person.email'        => ['email', 'nullable'],
            'person.age'          => ['numeric', 'required'],

            'letter.title'        => ['string', 'max:100'],
            'letter.content'      => ['required'],
            'letter.image'        => ['nullable', 'image', 'mimes:jpeg,jpg,png'],
        ];
    }
}
