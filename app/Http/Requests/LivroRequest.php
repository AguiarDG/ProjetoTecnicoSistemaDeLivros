<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required',
            'editora' => 'required',
            'edicao' => 'required',
            'ano_publicacao' => 'required',
            'valor' => 'required',
            'autores' => 'required',
            'assunto' => 'required'
        ];
    }

    public function messages(): array
    {
        return[
            'titulo.required' => 'Campo titulo é obrigatório!',
            'editora.required' => 'Campo editora é obrigatório!',
            'edicao.required' => 'Campo edicao é obrigatório!',
            'ano_publicacao.required' => 'Campo ano de publicação é obrigatório!',
            'valor.required' => 'Campo valor é obrigatório!',
        ];
    }
}
