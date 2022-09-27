<?php

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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')
                ->nullable(false)
                ->constrained('model_autos')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('salon_id')
                ->nullable(false)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->integer('year')
                ->default(0);
            $table->integer('price')
                ->default(0);
            $table->integer('quantity')
                ->default(1);
            $table->boolean('reserved')
                ->default(false);
            $table->text('desc')
                ->nullable(true);
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
        Schema::dropIfExists('stocks');
    }
};
