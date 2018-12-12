<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manager_id');
            $table->enum('action', [
                'login',
                'register',
                'update_user_password',
                'update_user_profile',
                'update_user_bank_card_no',
                'update_user_id_card',
                'update_user_wallet',
            ]);
            $table->string('before', 300);
            $table->string('after', 300);
            $table->integer('target_user_id')->default(0);
            $table->integer('target_manager_id')->default(0);
            $table->boolean('succ')->default(true);
            $table->timestamps();
            $table->index('manager_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manager_log');
    }
}
