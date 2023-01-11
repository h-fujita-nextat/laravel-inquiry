<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:user,name', 'max:255'],
            'email' => ['required', 'unique:user,email', 'max:255'],
            'password' => ['required', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前の入力',
            'email' => 'メールアドレスの入力',
            'password' => 'パスワードの入力',
        ];
    }
}
