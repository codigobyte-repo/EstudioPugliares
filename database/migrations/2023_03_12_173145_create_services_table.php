<?php

use App\Models\Services;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            
            $table->string('titulo');
            $table->string('descripcion_corta');
            $table->longText('descripcion_larga');
            $table->string('slug');
            $table->enum('descuento', [0, 1])->nullable();
            $table->enum('planes', [Services::EMPRESARIAL, Services::INDEPENDIENTE, Services::PROFESIONAL])->default(Services::EMPRESARIAL);
            $table->decimal('precio_tachado', 10, 2)->nullable();
            $table->decimal('precio', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
