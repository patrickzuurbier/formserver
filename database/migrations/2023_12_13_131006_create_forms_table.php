<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->unique();
            $table->string('method')->default('post');
            $table->string('action');
            $table->string('redirect_url');

            $table->timestamps();
        });
    }
}
