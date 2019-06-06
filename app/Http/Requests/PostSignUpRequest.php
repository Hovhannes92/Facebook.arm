<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class PostSignUpRequest extends FormRequest
{
    private $user;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:120',
            'password' => 'required|min:4'
        ];
    }

    public function persist()
    {
        $this->user = User::create($this->all());

        $this->user = bcrypt($this['password']);

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }
}
