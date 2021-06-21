<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add404And5xxColumnsToScrapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scrapes', function (Blueprint $table) {
            $table->integer('scrape_404_count')->default(0)->after('scrape_new_links_count');
            $table->integer('scrape_5xx_count')->default(0)->after('scrape_404_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scrapes', function (Blueprint $table) {

        });
    }
}
