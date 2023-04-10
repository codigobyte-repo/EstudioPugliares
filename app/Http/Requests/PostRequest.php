<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        /* Obtiene el valor de la URL pasado por parametro, por ejemplo: http://localhost/admin/posts/301/edit
        Obtiene el valor del post a traves del id 301 */
        $post = $this->route()->parameter('post');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2',
            'file' => 'image'
        ];

        /* Si en la variable post hay un registro significa que estamos editando el post por lo tanto 
        va a utilizar la regla de validación con el slug. Básicamente esto es por que al editar un post
        el slug es posible que deseemos utilizar el mismo y si no hacemos esto al momento de crear un post la variable $post no va a existir  */
        if($post){
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }

        if($this->status == 2){
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required'
            ]);
        }

        return $rules;
    }
}
