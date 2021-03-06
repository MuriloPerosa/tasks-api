<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTasksMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('label', 255);
            $table->unsignedInteger('user_id');
            $table->boolean('is_complete')->default(false);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            // $table->timestamps();
            $table->timestamp('created_at')->useCurrent(); // utiliza o timestamp atual por default
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate(); // utiliza o timestamp atual quando atualizado
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
