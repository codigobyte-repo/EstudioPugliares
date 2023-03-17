<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contacto;

class CaptchaComponent extends Component
{

    public $nombre;
    public $apellido;
    public $email;
    public $whatsapp;
    public $mensaje;

    public $num1;
    public $num2;
    public $result;
    public $captcha;
    public $valor;

    public function mount()
    {
        $this->generateCaptcha();
    }

    public function generateCaptcha()
    {
        
        $this->num1 = rand(1, 5);
        $this->num2 = rand(1, 5);
        $this->result = $this->num1 + $this->num2;
    }

    public function submit()
    {
        $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
            'mensaje' => 'required',
            'captcha' => 'required|numeric',
        ]);

        if ($this->captcha == $this->result) {

            Contacto::create([
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'email' => $this->email,
                'whatsapp' => $this->whatsapp,
                'mensaje' => $this->mensaje
            ]);

            session()->flash('message', 'Solicitud enviada correctamente, muchas gracias.');
    	    $this->resetInput();

        } else {
            // Captcha inválido, mostrar un mensaje de error
            $this->valor = "Por favor vuelva a verificar el captcha";
            return;
        }
    }

    private function resetInput()
    {
        $this->nombre = null;
    	$this->apellido = null;
    	$this->email = null;
    	$this->whatsapp = null;
        $this->mensaje = null;
        $this->captcha = null;
        $this->valor = null;
    }

    public function render()
    {
        return view('livewire.captcha-component');
    }
}
