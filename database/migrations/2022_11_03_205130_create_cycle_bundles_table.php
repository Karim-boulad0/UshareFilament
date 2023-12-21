<?php

use App\Models\Bundle;
use App\Models\Cycle;
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
        Schema::create('cycle_bundles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bundle::class)->constrained();
            $table->foreignIdFor(Cycle::class)->constrained();
            $table->string('stock');
            $table->softDeletes();
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
        Schema::dropIfExists('cycle_bundle');
    }
};
