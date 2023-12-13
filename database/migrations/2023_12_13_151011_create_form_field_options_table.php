<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFieldOptionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('form_field_options', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('form_field_id')->constrained()
                ->cascadeOnDelete();

            $table->json('label');
            $table->string('value');
            $table->boolean('is_default')->default(false);
            $table->string('position')->nullable();

            $table->timestamps();
        });
    }
}
