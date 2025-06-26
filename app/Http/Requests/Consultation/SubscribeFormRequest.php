<?php

namespace App\Http\Requests\Consultation;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => ['nullable', 'string', 'max:255'],
            'email'     => ['nullable', 'email', 'max:255'],
            'phone'     => ['required', 'string', 'max:30'],
            'policy_ch' => ['accepted'],
            'accept_ch' => ['accepted'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'Введите имя',
            'phone.required'     => 'Введите телефон',
            'policy_ch.accepted' => 'Необходимо согласиться с политикой обработки данных',
            'accept_ch.accepted' => 'Необходимо дать согласие на обработку персональных данных',
        ];
    }
}
