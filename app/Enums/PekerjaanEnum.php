<?php

namespace App\Enums;

enum PekerjaanEnum: string
{
    case PELAJAR_MAHASISWA = 'Pelajar/Mahasiswa';
    case MENGURUS_RUMAH_TANGGA = 'Mengurus Rumah Tangga';
    case BELUM_TIDAK_BEKERJA = 'Belum/Tidak Bekerja';
    case KARYAWAN_SWASTA = 'Karyawan Swasta';
    case NELAYAN_PERIKANAN = 'Nelayan/Perikanan';
    case PETANI_PEKEBUN = 'Petani/Pekebun';
    case WIRASWASTA = 'Wiraswasta';
    case PERANGKAT_DESA = 'Perangkat Desa';
    case PEGAWAI_NEGERI_SIPIL_PNS = 'Pegawai Negeri Sipil (PNS)';
    case GURU_SWASTA = 'Guru Swasta';
    case PERAWAT_SWASTA = 'Perawat Swasta';
    case KARYAWAN_HONORER = 'Karyawan Honorer';
    case BURUH_HARIAN_LEPAS = 'Buruh Harian Lepas';
    case TUKANG_BATU = 'Tukang Batu';
    case BURUH_TANI_PERKEBUNAN = 'Buruh Tani/Perkebunan';
    case GURU = 'Guru';
    case MONTIR = 'Montir';
    case TUKANG_LAS_PANDAI_BESI = 'Tukang Las/Pandai Besi';
    case BIDAN_SWASTA = 'Bidan Swasta';
    case SATPAM_SECURITY = 'Satpam/Security';
    case PEDAGANG_BARANG_KELONTONG = 'Pedagang Barang Kelontong';
    case KEPALA_DAERAH = 'Kepala Daerah';
    case TUKANG_CUKUR = 'Tukang Cukur';
    case TENTARA_NASIONAL_INDONESIA_TNI = 'Tentara Nasional Indonesia (TNI)';
    case KEPALA_DESA = 'Kepala Desa';
    case KEPOLISIAN_RI_POLRI = 'Kepolisian RI (Polri)';
    case ANGGOTA_DPD = 'Anggota DPD';
    case PSIKIATER_PSIKOLOG = 'Psikiater/Psikolog';
    case PELAUT = 'Pelaut';
    case ANGGOTA_LEGISLATIF = 'Anggota Legislatif';
    case DOKTER_SWASTA = 'Dokter Swasta';
    case PEMULUNG = 'Pemulung';
    case PERANCANG_BUSANA = 'Perancang Busana';
    case PROMOTOR_ACARA = 'Promotor Acara';
    case PENGUSAHA_KECIL_MENENGAH_DAN_BESAR = 'Pengusaha Kecil, Menengah dan Besar';
    case JASA_PENGOBATAN_ALTERNATIF = 'Jasa Pengobatan Alternatif';
    case PENELITI = 'Peneliti';
    case WARTAWAN = 'Wartawan';
    case JASA_PENYEWAAN_PERALATAN_PESTA = 'Jasa Penyewaan Peralatan Pesta';
    case KONSULTAN_MANAJEMEN_DAN_TEKNIS = 'Konsultan Manajemen dan Teknis';
    case TUKANG_SUMUR = 'Tukang Sumur';
    case PENERJEMAH = 'Penerjemah';
    case TUKANG_JAHIT = 'Tukang Jahit';
    case TUKANG_ANYAMAN = 'Tukang Anyaman';
    case PERAWAT = 'Perawat';
    case PARANORMAL = 'Paranormal';
    case PEMBANTU_RUMAH_TANGGA = 'Pembantu Rumah Tangga';
    case ARSITEK = 'Arsitek';
    case KONSULTAN = 'Konsultan';
    case PENSIUNAN = 'Pensiunan';
    case PENYIAR_RADIO = 'Penyiar Radio';
    case BURUH_USAHA_JASA_HIBURAN_DAN_PARIWISATA = 'Buruh Usaha Jasa Hiburan dan Pariwisata';
    case KARYAWAN_BUMN = 'Karyawan BUMN';
    case ANGGOTA_DPRD_PROVINSI = 'Anggota DPRD Provinsi';
    case BURUH_PETERNAKAN = 'Buruh Peternakan';
    case JURU_MASAK = 'Juru Masak';
    case AHLI_PENGOBATAN_ALTERNATIF = 'Ahli Pengobatan Alternatif';
    case JASA_KONSULTASI_MANAJEMEN_DAN_TEKNIS = 'Jasa Konsultasi Manajemen dan Teknis';
    case PEMELUK_AGAMA = 'Pemeluk Agama';
    case PETERNAK = 'Peternak';
    case BUPATI = 'Bupati';
    case LAINNYA = 'Lainnya';
    case PENATA_RIAS = 'Penata Rias';
    case PIALANG = 'Pialang';
    case BURUH_JASA_PERDAGANGAN_HASIL_BUMI = 'Buruh Jasa Perdagangan Hasil Bumi';
    case DUKUN_TRADISIONAL = 'Dukun Tradisional';
    case PEMILIK_USAHA_HOTEL_DAN_PENGINAPAN_LAINNYA = 'Pemilik Usaha Hotel dan Penginapan Lainnya';
    case TUKANG_SOL_SEPATU = 'Tukang Sol Sepatu';
    case DUTA_BESAR = 'Duta Besar';
    case ANGGOTA_DPRD_KABUPATEN_KOTA = 'Anggota DPRD Kabupaten/Kota';
    case KONTRAKTOR = 'Kontraktor';
    case PEMILIK_PERUSAHAAN = 'Pemilik Perusahaan';
    case INDUSTRI = 'Industri';
    case TUKANG_GIGI = 'Tukang Gigi';
    case ANGGOTA_KABINET_KEMENTRIAN = 'Anggota Kabinet/Kementrian';
    case NOTARIS = 'Notaris';
    case PRESIDEN = 'Presiden';
    case DOKTER = 'Dokter';
    case PEDAGANG_KELILING = 'Pedagang Keliling';
    case PENGRAJIN = 'Pengrajin';
    case SENIMAN = 'Seniman';
    case PEMILIK_USAHA_JASA_HIBURAN_DAN_PARIWISATA = 'Pemilik Usaha Jasa Hiburan dan Pariwisata';
    case PEMILIK_USAHA_JASA_TRANSPORTASI_DAN_PERHUBUNGAN = 'Pemilik Usaha Jasa Transportasi dan Perhubungan';
    case PENELITI_LAGI = 'Peneliti';
    case PENATA_RAMBUT = 'Penata Rambut';
    case IMAM_MASJID = 'Imam Masjid';
    case TUKANG_KAYU = 'Tukang Kayu';
    case PENATA_BUSANA = 'Penata Busana';
    case TUKANG_CUCI = 'Tukang Cuci';
    case WALIKOTA = 'Walikota';
    case BIARAWATI = 'Biarawati';
    case BURUH_USAHA_JASA_TRANSPORTASI_DAN_PERHUBUNGAN = 'Buruh Usaha Jasa Transportasi dan Perhubungan';
    case PEMILIK_USAHA_INFORMASI_DAN_KOMUNIKASI = 'Pemilik Usaha Informasi dan Komunikasi';
    case ARSITEKTUR_DESAINER = 'Arsitektur/Desainer';
    case BURUH_USAHA_HOTEL_DAN_PENGINAPAN_LAINNYA = 'Buruh Usaha Hotel dan Penginapan Lainnya';
    case PENAMBANG = 'Penambang';
    case WAKIL_PRESIDEN = 'Wakil Presiden';
    case PENYIAR_TELEVISI = 'Penyiar Televisi';
    case DOSEN_SWASTA = 'Dosen Swasta';
    case PENGUSAHA_PERDAGANGAN_HASIL_BUMI = 'Pengusaha Perdagangan Hasil Bumi';
    case USAHA_JASA_PENGERAH_TENAGA_KERJA = 'Usaha Jasa Pengerah Tenaga Kerja';
    case PENDETA = 'Pendeta';
    case ANGGOTA_BPK = 'Anggota BPK';
    case TABIB = 'Tabib';
    case PASTOR = 'Pastor';
    case BIDAN = 'Bidan';
    case TIDAK_MEMPUANYAI_PEKERJAAN_TETAP = 'Tidak Mempunyai Pekerjaan Tetap';
    case BURUH_NELAYAN_PERIKANAN = 'Buruh Nelayan/Perikanan';
    case MEKANIK = 'Mekanik';
    case USTAZ_MUBALIG = 'Ustaz/Mubalig';
    case DOSEN = 'Dosen';
    case PILOT = 'Pilot';
    case PENGACARA = 'Pengacara';
    case APOTEKER = 'Apoteker';
    case KARYAWAN_BUMD = 'Karyawan BUMD';
    case BURUH_MIGRAN = 'Buruh Migran';
    case WAKIL_WALIKOTA = 'Wakil Walikota';
    case PEDAGANG = 'Pedagang';
    case PEMILIK_USAHA_WARUNG_RUMAH_MAKAN_DAN_RESTORAN = 'Pemilik Usaha Warung, Rumah Makan dan Restoran';
    case TUKANG_KUE = 'Tukang Kue';
    case KONSTRUKSI = 'Konstruksi';
    case ANGGOTA_DPR_RI = 'Anggota DPR-RI';
    case PERDAGANGAN = 'Perdagangan';
    case BURUH_USAHA_JASA_INFORMASI_DAN_KOMUNIKASI = 'Buruh Usaha Jasa Informasi dan Komunikasi';
    case PARAJI = 'Paraji';
    case WAKIL_BUPATI = 'Wakil Bupati';
    case SOPIR = 'Sopir';
    case ANGGOTA_MAHKAMAH_KONSTITUSI = 'Anggota Mahkamah Konstitusi';
    case AKUNTAN = 'Akuntan';
    case GUBERNUR = 'Gubernur';
    case WAKIL_GUBERNUR = 'Wakil Gubernur';
    case PENGRAJIN_INDUSTRI_RUMAH_TANGGA = 'Pengrajin Industri Rumah Tangga';
    case TRANSPORTASI = 'Transportasi';
    case TUKANG_LISTRIK = 'Tukang Listrik';

    public static function options(): array
    {
        $options = array_column(self::cases(), 'value', 'name');
        asort($options);
        return $options;
    }


    public function label(): string
    {
        return $this->value;
    }

    public static function cariNamaPekerjaan(string $name): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->name === $name) {
                return $case;
            }
        }
        return null;
    }
}

