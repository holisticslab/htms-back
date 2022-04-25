<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cohort_id')->constrained('cohorts');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string(column: 'invoice_num');
            $table->string(column: 'invoice_amount');
            $table->date(column: 'invoice_due');
            $table->date(column: 'invoice_date');
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
        Schema::dropIfExists('invoices');
    }
}
