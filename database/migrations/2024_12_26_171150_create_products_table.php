<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable(); // Product description
            $table->decimal('price', 8, 2); // Price of the product
            $table->unsignedBigInteger('category_id')->nullable(); // Foreign key for category

            $table->string('image_path'); // Image path
            $table->boolean('is_active')->default(true); // Active status
            $table->timestamps();

            // Foreign key constraint (assuming you have a categories table)
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
