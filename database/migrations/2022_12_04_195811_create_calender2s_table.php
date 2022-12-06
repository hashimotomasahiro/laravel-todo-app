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
        Schema::create('calender2s', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->date('end_day')->comment('終了日');
            $table->date('start_day')->comment('開始日');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('selected_date')->comment('選択年月日');
            $table->boolean('done')->default(false);
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
        Schema::dropIfExists('calender2s');
    }
};
