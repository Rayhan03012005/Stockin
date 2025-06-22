    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateTransactionsTable extends Migration
    {
        public function up()
        {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('item_id')->constrained()->onDelete('cascade');
                $table->foreignId('peminjam_id')->constrained('users')->onDelete('cascade');
                $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
                $table->date('borrow_date');
                $table->date('return_date')->nullable();
                $table->enum('status', ['pending', 'returned'])->default('pending');
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('transactions');
        }
    }