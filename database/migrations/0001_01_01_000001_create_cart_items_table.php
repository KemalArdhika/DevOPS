<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration {
    public function up() {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            // foreignId() otomatis membuat kolom bigint unsigned dan constraint
            $table->foreignId('product_id')
                  ->constrained()            // mengacu ke products.id
                  ->onDelete('cascade');     // jika produk dihapus, item keranjang ikut terhapus
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('cart_items');
    }
}
