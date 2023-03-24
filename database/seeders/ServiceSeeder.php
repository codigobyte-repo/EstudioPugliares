<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Services;


class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicios = [
            [
                'titulo' => 'Asesoría Contable Integral',
                'descripcion' => 'Este servicio te brinda la tranquilidad de tener el control de tus finanzas y cumplir con tus obligaciones fiscales. Te ofrecemos la gestión contable completa, desde la elaboración de los estados financieros hasta la presentación de tus impuestos. ¡Deja tus números en manos de expertos!' ,
            ],
            [
                'titulo' => 'Auditoría Financiera',
                'descripcion' => 'Nuestro equipo de expertos puede ayudarte a evaluar la calidad y veracidad de la información financiera de tu empresa. Con nuestro servicio de auditoría, puedes estar seguro de que tus estados financieros cumplen con los estándares contables internacionales y están libres de errores o irregularidades.' ,
            ],
            [
                'titulo' => 'Planificación Tributaria',
                'descripcion' => '¡No más sorpresas fiscales! Te ofrecemos la planificación tributaria para minimizar el impacto fiscal y aprovechar todas las oportunidades de ahorro en impuestos. Como expertos en la materia, te asesoramos en la mejor estrategia fiscal que se adapte a tus necesidades.' ,
            ],
            [
                'titulo' => 'Consultoría en Financiamiento y Crédito',
                'descripcion' => 'Si necesitas financiamiento para tu negocio, nosotros podemos ayudarte. Como expertos en finanzas, te ofrecemos la asesoría en la obtención de créditos y financiamientos que se adapten a tus necesidades y te ayuden a impulsar el crecimiento de tu empresa.' ,
            ],
            [
                'titulo' => 'Consultoría Financiera',
                'descripcion' => 'Si necesitas tomar decisiones importantes en tu negocio, te ofrecemos nuestra consultoría financiera. Analizamos tus finanzas, te ofrecemos recomendaciones y te ayudamos a tomar las mejores decisiones para el futuro de tu empresa.' ,
            ],
            [
                'titulo' => 'Gestión de Nómina y Recursos Humanos',
                'descripcion' => 'La gestión de nómina y recursos humanos es una tarea importante que puede requerir mucho
                ' ,
            ],
        ];

        foreach($servicios as $servicio) {
            Services::create($servicio)->first();
        }
    }
}
