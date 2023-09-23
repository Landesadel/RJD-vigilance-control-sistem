<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'last_name' => 'required|string',
            'name' => 'required|string',
            'second_name' => 'sometimes|string',
            'crew_id' => 'required|integer',
            'role_id' => 'required|string',
            'assistant_last_name' => 'nullable|string',
            'assistant_name' => 'nullable|string',
            'assistant_second_name' => 'nullable|string',
        ];
    }

    /**
     * @return array
     */
    public function getRoleId(): array
    {
        return (array) $this->validated('role_id');
    }

    /**
     * @return array
     */
    public function getCrewId(): array
    {
        return (array) $this->validated('crew_id');
    }
}
