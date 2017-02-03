<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->renameColumn('good_id', 'goods_id');
            $table->renameColumn('good_name', 'goods_name');
            $table->renameColumn('good_price', 'goods_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->renameColumn('goods_id', 'good_id');
            $table->renameColumn('goods_name', 'good_name');
            $table->renameColumn('goods_price', 'good_price');
        });
    }
}
