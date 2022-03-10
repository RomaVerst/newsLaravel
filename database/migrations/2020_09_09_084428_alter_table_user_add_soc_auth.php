<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUserAddSocAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->string('id_in_soc', 20)
                ->default('')
                ->comment('id в соцсети');
            $table->enum('type_auth', ['site', 'vk', 'git'])
                ->default('site')
                ->comment('Тип авторизации');
            $table->string('avatar', 255)
                ->default('')
                ->comment('ссылка на аватарку');
            $table->index('id_in_soc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn(['id_in_soc', 'type_auth', 'avatar']);
        });
    }
}
