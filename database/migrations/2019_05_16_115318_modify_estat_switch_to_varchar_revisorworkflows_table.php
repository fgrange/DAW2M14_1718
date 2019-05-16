<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyEstatSwitchToVarcharRevisorworkflowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //######## Prerequisit!!! -> composer require doctrine/dbal  ###########
    public function up()
    {
        Schema::table('revisorworkflows', function (Blueprint $table) {
            $table->dropColumn('estat');
        });
        Schema::table('revisorworkflows', function (Blueprint $table) {
            $table->enum('estat', ['Nou', 'Examinant', 'Revisat', 'Rebutjat', 'Aprovat', 'Denegat', 'Finalitzat']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('revisorworkflows', function (Blueprint $table) {
            //
        });
    }
}
