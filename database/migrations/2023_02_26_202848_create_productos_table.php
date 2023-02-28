<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->index();
            $table->unsignedBigInteger('id_talla')->index();
            $table->unsignedBigInteger('id_marca')->index();
            $table->integer('cantidad');
            $table->text('observacion')->nullable();
            $table->date('fecha_embarque');
            $table->timestamps();

            $table->foreign( 'id_talla' )
                      ->references( 'id' )
                      ->on( 'tallas' )
                      ->onDelete( 'cascade' );

            $table->foreign( 'id_marca' )
                      ->references( 'id' )
                      ->on( 'marcas' )
                      ->onDelete( 'cascade' );
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
