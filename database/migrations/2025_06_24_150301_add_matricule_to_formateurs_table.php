<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('formateurs', function (Blueprint $table) {
            $table->string('matricule')->unique()->after('code');
        });
    }

    public function down()
    {
        Schema::table('formateurs', function (Blueprint $table) {
            $table->dropColumn('matricule');
        });
    }

};
