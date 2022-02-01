<?php

namespace WalkerChiu\Device\Models\Forms;

use WalkerChiu\Core\Models\Forms\FormRequest;

class DeviceDeleteFormRequest extends FormRequest
{
    /**
     * @Override Illuminate\Foundation\Http\FormRequest::getValidatorInstance
     */
    protected function getValidatorInstance()
    {
        return parent::getValidatorInstance();
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return Array
     */
    public function attributes()
    {
        return [
            'host_type' => trans('php-device::device.host_type'),
            'host_id'   => trans('php-device::device.host_id')
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return Array
     */
    public function rules()
    {
        return [
            'id'        => ['required','string','exists:'.config('wk-core.table.device.devices').',id'],
            'host_type' => 'required_with:host_id|string',
            'host_id'   => 'required_with:host_type|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return Array
     */
    public function messages()
    {
        return [
            'id.required'             => trans('php-core::validation.required'),
            'id.string'               => trans('php-core::validation.string'),
            'id.exists'               => trans('php-core::validation.exists'),
            'host_type.required_with' => trans('php-core::validation.required_with'),
            'host_type.string'        => trans('php-core::validation.string'),
            'host_id.required_with'   => trans('php-core::validation.required_with'),
            'host_id.string'          => trans('php-core::validation.string'),
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
    }
}
