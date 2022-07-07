<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {

            $table->id();
            $table->foreignId('instansi_id')->constrained();
            $table->string('verified')->default('0');
            $table->string('status')->default('Belum Terkirim');

            $table->integer('ktp_baru_l')->default('0');
            $table->integer('ktp_baru_p')->default('0');
            $table->integer('ktp_rusak_l')->default('0');
            $table->integer('ktp_rusak_p')->default('0');
            $table->integer('ktp_update_l')->default('0');
            $table->integer('ktp_update_p')->default('0');
            $table->integer('ktp_hilang_l')->default('0');
            $table->integer('ktp_hilang_p')->default('0');
            $table->integer('ktp_pindah_l')->default('0');
            $table->integer('ktp_pindah_p')->default('0');
            $table->integer('ktp_siak_l')->default('0');
            $table->integer('ktp_siak_p')->default('0');
            $table->integer('ktp_suket_l')->default('0');
            $table->integer('ktp_suket_p')->default('0');
            $table->integer('ktp_gagal_l')->default('0');
            $table->integer('ktp_gagal_p')->default('0');
            $table->integer('ktp_perekaman_l')->default('0');
            $table->integer('ktp_perekaman_p')->default('0');
            $table->integer('prr')->default('0');
            $table->integer('duplicated')->default('0');
            $table->integer('sfe')->default('0');
            $table->integer('sisa_blanko')->default('0');
            $table->integer('pemusnahan_ktp')->default('0');
            $table->integer('pencetakan_kk')->default('0');
            $table->integer('pencetakan_kia_l')->default('0');
            $table->integer('pencetakan_kia_p')->default('0');
            $table->integer('pencetakan_suket_l')->default('0');
            $table->integer('pencetakan_suket_p')->default('0');
            $table->integer('pwni_pindah_l')->default('0');
            $table->integer('pwni_pindah_p')->default('0');
            $table->integer('pwni_datang_l')->default('0');
            $table->integer('pwni_datang_p')->default('0');
            $table->integer('pwni_pindah_online_l')->default('0');
            $table->integer('pwni_pindah_online_p')->default('0');
            $table->integer('penerbitan_akte_kelahiran_l')->default('0');
            $table->integer('penerbitan_akte_kelahiran_p')->default('0');
            $table->integer('penerbitan_akte_kematian_l')->default('0');
            $table->integer('penerbitan_akte_kematian_p')->default('0');
            $table->integer('penerbitan_akte_perceraian_')->default('0');
            $table->integer('penerbitan_akte_perkawinan_islam')->default('0');
            $table->integer('penerbitan_akte_perkawinan_kristen')->default('0');
            $table->integer('penerbitan_akte_perkawinan_katholik')->default('0');
            $table->integer('penerbitan_akte_perkawinan_budha')->default('0');
            $table->integer('penerbitan_akte_perkawinan_hindu')->default('0');
            $table->integer('penerbitan_akte_perkawinan_konghuchu')->default('0');
            $table->integer('penerbitan_akte_perkawinan_aliran_kepercayaan')->default('0');
            $table->integer('penerbitan_akte_pengesahan_anak')->default('0');

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
        Schema::dropIfExists('laporans');
    }
}
