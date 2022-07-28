<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemovePrimaryKeyMaterialsDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // remove primary key
        Schema::table('materials_db', function (Blueprint $table) {
            $table->dropPrimary();
            $table->unsignedInteger('id'); // for removing auto increment
        });
    }
}
