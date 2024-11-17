<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Main Menu</li>
            <li><a href="{{ route('dashboard') }}" aria-expanded="false"><i class="bi bi-speedometer2"></i><span
                        class="nav-text">Dashboard</span></a></li>
            <li><a href="{{ route('kriteria') }}" aria-expanded="false"><i class="bi bi-bookmark"></i><span
                        class="nav-text">Kriteria</span></a></li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Sub Kriteria</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('sub_kriteria.ipk.index') }}" aria-expanded="false"><i
                                class="bi bi-journal-text"></i><span class="nav-text">IPK</span></a></li>
                    <li><a href="{{ route('sub_kriteria.tes_pemrograman.index') }}" aria-expanded="false"><i
                                class="bi bi-code-slash"></i><span class="nav-text">Tes Pemrograman</span></a></li>
                    <li><a href="{{ route('sub_kriteria.kemampuan_mengajar.index') }}" aria-expanded="false"><i
                                class="bi bi-award"></i><span class="nav-text">Kemampuan Mengajar</span></a></li>
                    <li><a href="{{ route('sub_kriteria.nilai_referensi.index') }}" aria-expanded="false"><i
                                class="bi bi-bar-chart"></i><span class="nav-text">Nilai Referensi</span></a></li>
                    <li><a href="{{ route('sub_kriteria.kerja_sama.index') }}" aria-expanded="false"><i
                                class="bi bi-people"></i><span class="nav-text">Kerja Sama</span></a></li>
                </ul>
            </li>
            <li><a href="{{ route('data-alternatif') }}" aria-expanded="false"><i class="bi bi-list-task"></i><span
                        class="nav-text">Data Alternatif</span></a></li>
            <li>
            <li><a href="{{ route('matriks-keputusan') }}" aria-expanded="false"><i class="bi bi-table"></i><span
                        class="nav-text">Matriks Keputusan</span></a></li>
            <li>
            <li><a href="{{ route('normalisasi') }}" aria-expanded="false"><i class="bi bi-gear"></i><span
                        class="nav-text">Hasil Normalisasi</span></a></li>
            <li><a href="{{ route('normalisasiBobot-Ranking') }}" aria-expanded="false"><i
                        class="bi bi-sort-numeric-down"></i>
                    <span class="nav-text">Normalisasi Bobot & Ranking</span>
                </a></li>
            <li class="menu-separator"></li>
            <li>
                <a href="#" data-toggle="modal" data-target="#logoutModal" aria-expanded="false">
                    <i class="bi bi-box-arrow-left"></i>
                    <span class="nav-text">Keluar</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<style>
    .menu-separator {
        border-top: 1px solid #eaeaea;
        /* Warna dan tebal garis */
        margin: 10px 0;
        /* Jarak antar item */
    }
</style>
