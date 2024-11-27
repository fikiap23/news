<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgendaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Adjust as needed for authorization
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'theme' => 'required|string|max:255', // The theme of the agenda, required and a string
            'place' => 'required|string|max:255', // The place of the agenda, required and a string
            'start_date' => 'required|date|after_or_equal:today', // The start date, required and a valid date
            'end_date' => 'required|date|after_or_equal:start_date', // The end date, required and a valid date
            'activity' => 'required|string|max:1000', // The activity for the agenda, required and a string
        ];
    }

    /**
     * Custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'theme.required' => 'The agenda theme is required.',
            'theme.string' => 'The agenda theme must be a valid string.',
            'theme.max' => 'The agenda theme cannot exceed 255 characters.',

            'place.required' => 'The agenda place is required.',
            'place.string' => 'The agenda place must be a valid string.',
            'place.max' => 'The agenda place cannot exceed 255 characters.',

            'start_date.required' => 'The agenda start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'start_date.after_or_equal' => 'The start date must be today or in the future.',

            'end_date.required' => 'The agenda end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after_or_equal' => 'The end date must be the same as or after the start date.',

            'activity.required' => 'The activity for the agenda is required.',
            'activity.string' => 'The activity must be a valid string.',
            'activity.max' => 'The activity cannot exceed 1000 characters.',
        ];
    }
}
