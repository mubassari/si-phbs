<?php

use App\Models\Preferensi;
use App\Models\Survey;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinjauanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinjauan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete("cascade");
            $table->foreignIdFor(Preferensi::class, 'preferensi_id')->constrained('preferensi', 'id')->onDelete("cascade");
            $table->foreignIdFor(Survey::class, 'survey_id')->constrained('survey', 'id')->onDelete("cascade");
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
        Schema::dropIfExists('tinjauan');
    }
}
