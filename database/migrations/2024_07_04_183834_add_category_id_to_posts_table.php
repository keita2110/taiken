<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
        $table->foreignId('category_id')->constrained()->onDelete('cascade'); 
        //foreignIdはUNSIGNED BIGINTを作り出すメソッド
        //constarainedメソッドは参照先のテーブルとカラムの名前を決めるためのメソッド
        
        //'category_id' は 'categoriesテーブル' の 'id' を参照する外部キーです
        //onDelete('cascade')によって削除時のcascadeを設定することができます。
        //その他にも更新を反映させるonUpdate('cascade')も存在します。
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
