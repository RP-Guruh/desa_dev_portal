@extends('layouts.app')
@section('content')
@include('partials.navbar')


<div class="intro">
    <div class="title">Infografis Demografi Penduduk</div>
  </div>

  <div class="container">
    <div class="filter-bar">
    <select id="tahunSelect" onchange="filterTahun()">
        @foreach($tahun as $t)
            <option value="{{ $t }}">Tahun {{ $t }}</option>
        @endforeach
    </select>
    </div>

    <section class="infografis-section" id="kelamin">
      <h2>Distribusi Penduduk Menurut Jenis Kelamin</h2>
      <div class="chart-placeholder" id="chartjeniskelamin">Data Tidak Tersedia</div>
    </section>

    <section class="infografis-section" id="usia">
      <h2>Distribusi Penduduk Menurut Kelompok Usia</h2>
      <div class="chart-placeholder" id="chartusiapenduduk">Data Tidak Tersedia</div>
    </section>

    <section class="infografis-section" id="pendidikan">
      <h2>Distribusi Penduduk Menurut Tingkat Pendidikan</h2>
      <div class="chart-placeholder" id="chartpendidikan">Grafik Pendidikan (2025)</div>
    </section>

    <section class="infografis-section" id="agama">
      <h2>Distribusi Penduduk Menurut Agama dan Kepercayaan</h2>
      <div class="chart-placeholder" id="chartagama">Grafik Agama (2025)</div>
    </section>

    <section class="infografis-section" id="agama">
      <h2>Distribusi Penduduk Menurut Status Perkawinan</h2>
      <div class="chart-placeholder" id="chartperkawinan">Grafik Perkawinan (2025)</div>
    </section>

    <section class="infografis-section" id="pekerjaan">
      <h2>Jenis Pekerjaan</h2>
      <div class="chart-placeholder">Grafik Pekerjaan (2025)</div>
    </section>
  </div>


@include('partials.footer')
@endsection