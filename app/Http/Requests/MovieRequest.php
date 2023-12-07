<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MovieRequest extends FormRequest {
    public function validate() {
        $instance = $this->getValidatorInstance();
        if($instance->fails()) {
            throw new HttpResponseException(response()->json($instance->errors(), 422));
        }
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:movies,slug,'.request()->route('movie'),
            'category_id' => 'required|integer',
            'country_id' => 'required|integer',
            'genre_id' => 'required|integer',
            'thumbnail' => 'required',
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'Vui lòng tiêu đề.',
            'slug.required' => 'Vui lòng đường dẫn.',
            'category_id.required' => 'Vui lòng danh mục.',
            'country_id.required' => 'Vui lòng quốc gia.',
            'genre_id.required' => 'Vui lòng thể loại.',
            'category_id.integer' => 'Vui lòng danh mục.',
            'country_id.integer' => 'Vui lòng quốc gia.',
            'genre_id.integer' => 'Vui lòng thể loại.',
            'thumbnail.required' => 'Vui lòng ảnh.',
        ];
    }
}
