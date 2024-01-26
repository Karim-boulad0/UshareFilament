<?php

use App\Models\Bundle;
use App\Models\Cycle;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cycle::class)->constrained();
            $table->foreignIdFor(Bundle::class)->constrained()->onUpdate('RESTRICT');;
            $table->foreignIdFor(User::class)->constrained();
            $table->string('phone_number');
            $table->unique(['phone_number', 'bundle_id', 'cycle_id']);
            $table->string('verification_code', 8)->nullable();
            $table->string('note')->nullable();
            $table->boolean('is_approve')->default(0);
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
        Schema::dropIfExists('subscriptions');
    }
};
