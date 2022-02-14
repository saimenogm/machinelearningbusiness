<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
     		 $table->string('title') ;
			$table->dateTime('date_posted');			
			$table->dateTime('date_updated');	
			$table->bigInteger('posted_by');	
			$table->foreign('posted_by')->references('id')->on('users');		
			$table->string ('tags')->nullable();			
			$table->string ('category_name')->nullable();			
			$table->text ('description')->nullable();			
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
        Schema::dropIfExists('blogs');
    }
}
