<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->string('top')->nullable()->change();
            $table->string('second')->nullable()->change();
            $table->string('third')->nullable()->change();
            $table->string('income')->nullable()->change();
            $table->string('spending')->nullable()->change();
            $table->string('map_id')->nullable()->change();
            $table->dropColumn('fourth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grades', function (Blueprint $table) {
            
        });
    }
}
