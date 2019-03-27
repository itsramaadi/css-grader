<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtrasToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('score')->default(0);
            $table->integer('role_lvl')->default(0);
            $table->string('avatar_url')->default('/img/noavatar.png');
            $table->string('class', 9);
            $table->string('gender');
            $table->integer('css_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('score');
            $table->dropColumn('role_lvl');
            $table->dropColumn('avatar_url');
            $table->dropColumn('class');
            $table->dropColumn('gender');
            $table->dropColumn('css_number');
        });
    }
}
