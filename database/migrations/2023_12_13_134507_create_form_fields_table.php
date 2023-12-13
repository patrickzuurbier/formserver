<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFieldsTable extends Migration
{
    public function up(): void
    {
        Schema::create('form_fields', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('form_id')->constrained()
                ->cascadeOnDelete();

            $table->smallInteger('step')->default(1);
            $table->string('input_id')->unique();
            $table->string('name');
            $table->string('type');
            $table->json('label');
            $table->json('placeholder')->nullable();
            $table->json('help')->nullable();
            $table->string('rules');
            $table->smallInteger('position');

            $table->timestamps();
        });
    }
}
