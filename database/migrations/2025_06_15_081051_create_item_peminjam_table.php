<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPeminjamTable extends Migration
{
    public function up()
    {
        Schema::create('item_peminjam', function (Blueprint $table) {
            $table->foreignId('item_id')->constrained()->onDelete('cascade');
            $table->foreignId('peminjam_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['item_id', 'peminjam_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_peminjam');
    }
}