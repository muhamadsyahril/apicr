<?php

namespace App\Containers\AppSection\Authentication\UI\API\Requests;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
    ];

    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
    ];

    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
            'username' => 'required|unique:users,username|max:100',
            'email' => 'required|email|unique:users,email|max:100',
            'phone_number' => 'required|max:100',
            'referral_code' => 'max:100',
            'company_name' => 'required|max:100',
            'company_province' => 'required|max:100',
            'company_city' => 'required|max:100',
            'term' => 'required|max:10',
            'password' => [
                'required',
                'confirmed',
                'max:255',
                User::getPasswordValidationRules(),
            ],
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
