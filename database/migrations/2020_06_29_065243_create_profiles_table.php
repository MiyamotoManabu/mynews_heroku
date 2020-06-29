<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            /*
            Laravel014課題4【応用】 create_profiles_table というMigrationの雛形ファイルを作成し、 profilesというテーブル名で
            名前(name)、性別(gender)、趣味(hobby)、自己紹介(introduction)を保存できるように修正して、 
            migrateしてテーブルを作成しましょう。
            */
            $table->string('name'); // 名前を保存するカラム
            $table->string('gender');  // 性別を保存するカラム
            $table->string('hobby');  // 趣味を保存するカラム
            $table->string('introduction');//自己紹介を保存するカラム
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
        Schema::dropIfExists('profiles');
    }
}
