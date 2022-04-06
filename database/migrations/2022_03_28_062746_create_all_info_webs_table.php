<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllInfoWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_info_webs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logoHeader');
            $table->string('logoFooter');
            $table->string('logoLoadPage');
            $table->string('icon');
            $table->string('target');
            $table->string('slogan');
            $table->string('numberHeader');
            $table->string('numberFooter');
            $table->string('GmailFooter');
            $table->string('memberOne');
            $table->string('menberTow');
            $table->string('LinkFBFooter');
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
        Schema::dropIfExists('all_info_webs');
    }
}
