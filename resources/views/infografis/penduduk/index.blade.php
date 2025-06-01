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
      <h2>Jumlah Penduduk Berdasarkan Jenis Kelamin</h2>
      <div class="chart-placeholder" id="chartjeniskelamin">Data Tidak Tersedia</div>
    </section>

    <section class="infografis-section" id="usia">
      <h2>Distribusi Usia Penduduk</h2>
      <div class="chart-placeholder" id="chartusiapenduduk">Data Tidak Tersedia</div>
    </section>

    <section class="infografis-section" id="pendidikan">
      <h2>Tingkat Pendidikan</h2>
      <div class="chart-placeholder">Grafik Pendidikan (2025)</div>
    </section>

    <section class="infografis-section" id="pekerjaan">
      <h2>Jenis Pekerjaan</h2>
      <div class="chart-placeholder">Grafik Pekerjaan (2025)</div>
    </section>
  </div>

  <footer class="footer_infographis">
    Sumber Data: Dinas Kependudukan Desa Nusantara
  </footer>


@include('partials.footer')
@endsection