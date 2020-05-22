<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketit_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('private_name')->unique();
            $table->string('public_name');
            $table->integer('user_id')->unsigned();
            $table->integer('ticket_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('ticketit_attachments', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('ticket_id');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::drop('ticketit_attachments');
    }
}
