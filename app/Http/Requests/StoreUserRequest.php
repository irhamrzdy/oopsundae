<?php

namespace App\Http\Requests;

use App\DTO\UserDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'          => 'string|required|max:40',
            'email'         => 'email|required|unique:users',
            'password'      => 'string|required|min:8'
        ];
    }

    public function toDTO(): UserDTO
    {
        return new UserDTO(
            [
                'name'  => $this->name,
                'email' => $this->email,
                'password'  => $this->password
            ]
        );
    }
}
