<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            {{-- <div class="breadcrumb-item"><a href="#">Layout</a></div>--}}
            {{-- <div class="breadcrumb-item">Default Layout</div>--}}
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        {{-- <x-jet-welcome/>--}}
        <div class="container p-5">
            <h1>Selamat Datang Sobat LAOS</h1>
            <p>
                Silakan mengisi data diri pada menu Verification terlebih dahulu. Jika akun telah terverifikasi, silahkan pilih menu Pemilu untuk memilih calon ketua UKM LAOS.
                Bersama kita sukseskan pemilihan calon ketua UKM LAOS Periode 2021/2022 untuk UKM LAOS yang lebih maju dan lebih baik
            </p>


            <br><br><br>
            <h6>Status pemilihan anda saat ini: {{Auth::user()->userVerification->statusVerification->title}}</h6>

        </div>
    </div>
</x-app-layout>