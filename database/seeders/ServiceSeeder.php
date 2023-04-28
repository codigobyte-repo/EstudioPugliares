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
                'descripcion_corta' => 'Descripcion corta',
                'descripcion_larga' => 'Este servicio te brinda la tranquilidad de tener el control de tus finanzas y cumplir con tus obligaciones fiscales. Te ofrecemos la gestión contable completa, desde la elaboración de los estados financieros hasta la presentación de tus impuestos. ¡Deja tus números en manos de expertos!',
                'slug' => 'Asesoria-contable-integral',
                'descuento' => 1,
                'planes' => 1,
                'precio_tachado' => 8500,
                'precio' => 7500
            ],
            [
                'titulo' => 'Auditoría Financiera',
                'descripcion_corta' => 'Descripcion corta',
                'descripcion_larga' => 'Nuestro equipo de expertos puede ayudarte a evaluar la calidad y veracidad de la información financiera de tu empresa. Con nuestro servicio de auditoría, puedes estar seguro de que tus estados financieros cumplen con los estándares contables internacionales y están libres de errores o irregularidades.',
                'slug' => 'auditoria-financiera',
                'descuento' => 1,
                'planes' => 1,
                'precio_tachado' => 28500,
                'precio' => 25000
            ],
            [
                'titulo' => 'Planificación Tributaria',
                'descripcion_corta' => 'Descripcion corta',
                'descripcion_larga' => '¡No más sorpresas fiscales! Te ofrecemos la planificación tributaria para minimizar el impacto fiscal y aprovechar todas las oportunidades de ahorro en impuestos. Como expertos en la materia, te asesoramos en la mejor estrategia fiscal que se adapte a tus necesidades.',
                'slug' => 'planificacion-tributaria',
                'descuento' => 1,
                'planes' => 1,
                'precio_tachado' => 18500,
                'precio' => 17500
            ],
            [
                'titulo' => 'Consultoría en Financiamiento y Crédito',
                'descripcion_corta' => 'Descripcion corta',
                'descripcion_larga' => 'Si necesitas financiamiento para tu negocio, nosotros podemos ayudarte. Como expertos en finanzas, te ofrecemos la asesoría en la obtención de créditos y financiamientos que se adapten a tus necesidades y te ayuden a impulsar el crecimiento de tu empresa.',
                'slug' => 'consultoria-en-financiamiento-y-credito',
                'descuento' => 1,
                'planes' => 1,
                'precio_tachado' => 8500,
                'precio' => 7500
            ],
            [
                'titulo' => 'Consultoría Financiera',
                'descripcion_corta' => 'Descripcion corta',
                'descripcion_larga' => 'Si necesitas tomar decisiones importantes en tu negocio, te ofrecemos nuestra consultoría financiera. Analizamos tus finanzas, te ofrecemos recomendaciones y te ayudamos a tomar las mejores decisiones para el futuro de tu empresa.',
                'slug' => 'consultoria-financiera',
                'descuento' => 1,
                'planes' => 1,
                'precio_tachado' => 8500,
                'precio' => 7500
            ],
            [
                'titulo' => 'Gestión de Nómina y Recursos Humanos',
                'descripcion_corta' => 'Descripcion corta',
                'descripcion_larga' => 'La gestión de nómina y recursos humanos es una tarea importante que puede requerir mucho',
                'slug' => 'gestion-de-nomina-y-recursos-humanos',
                'descuento' => 1,
                'planes' => 1,
                'precio_tachado' => 15500,
                'precio' => 1500
            ],
        ];

        foreach($servicios as $servicio) {
            Services::create($servicio)->first();
        }
    }
}
