<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        {{--        <x-jet-welcome/>--}}

        <div class="container p-5">
            <h4 class="text-primary">{{$user->status==2?'Berkas anda telah diverifikasi':''}}</h4>
            <form action="{{route('admin.user-verification.update',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="form-group col-span-6 sm:col-span-5">
                <label for="full_name">{{__('Nama Lengkap')}}</label>
                <input type="text" class="mt-1 block w-full form-control shadow-none @error('full_name') is-invalid @enderror" name="full_name" id="full_name" value="{{$user->full_name}}" {{$user->status==2?'disabled':''}}/>
                @error('full_name')
                <div id="validationServer03Feedback"
                     class="invalid-feedback"> {{'Silakan isi nama lengkap!'}} </div>
                @enderror
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <label for="nim">{{__('NIM')}}</label>
                <input type="number" class="mt-1 block w-full form-control shadow-none @error('nim') is-invalid @enderror" name="nim" id="nim" value="{{$user->nim}}" {{$user->status==2?'disabled':''}} />
                @error('nim')
                <div id="validationServer03Feedback"
                     class="invalid-feedback"> {{'Silakan isi nim!'}} </div>
                @enderror
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <label for="year">{{__('Angkatan')}}</label>
                <input type="number" class="mt-1 block w-full form-control shadow-none @error('year') is-invalid @enderror" name="year" id="year" value="{{$user->year}}" {{$user->status==2?'disabled':''}}/>
                @error('year')
                <div id="validationServer03Feedback"
                     class="invalid-feedback"> {{'Silakan isi angkatan!'}} </div>
                @enderror
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <label for="program_study">{{__('Program Studi')}}</label>
                <select name="program_study" id="program_study" class="t-1 block w-full form-control shadow-none @error('program_study') is-invalid @enderror" {{$user->status==2?'disabled':''}}>
                    <option {{$user->program_study=="Sistem Informasi" ? 'selected':''}} value="Sistem Informasi">Sistem Informasi</option>
                    <option {{$user->program_study=="Teknologi Informasi" ? 'selected':''}} value="Teknologi Informasi">Teknologi Informasi</option>
                    <option {{$user->program_study=="Informatika" ? 'selected':''}} value="Informatika">Informatika</option>
                </select>
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <label for="file">{{__('Foto bersama KTM atau screenshot biodata SISTER')}}</label>
                <input type="file" class="mt-1 block w-full form-control shadow-none @error('file') is-invalid @enderror" name="file" id="file" {{$user->status==2?'disabled':''}}/>
                <img src="{{asset('storage/user-verification/'.$user->image)}}" style="max-height: 200px" alt="masih belum terisi">
                @error('file')
                <div id="validationServer03Feedback"
                     class="invalid-feedback"> {{'File hanya boleh jpeg,jpg,png dan file max : 2000kb'}} </div>
                @enderror
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <label for="no_wa">{{__('Nomor WhatsApp')}}</label>
                <input type="text" class="mt-1 block w-full form-control shadow-none @error('no_wa') is-invalid @enderror" name="no_wa" id="no_wa" value="{{$user->no_wa}}" {{$user->status==2?'disabled':''}}/>
                @error('no_wa')
                <div id="validationServer03Feedback"
                     class="invalid-feedback"> {{'Silakan isi nomor WhatsApp!'}} </div>
                @enderror
            </div>

                @if(Auth::user()->role==1)
                    <div class="form-group col-span-6 sm:col-span-5">
                        <label for="status">{{__('Status verifikasi')}}</label>
                        <select name="status" id="status" class="t-1 block w-full form-control shadow-none @error('program_study') is-invalid @enderror" {{$user->status==2?'disabled':''}}>
                            <option {{$user->status==0 ? 'selected':''}} value="0">Belum mengisi form</option>
                            <option {{$user->status==1 ? 'selected':''}} value="1">Menunggu verifikasi admin</option>
                            <option {{$user->status==2 ? 'selected':''}} value="2">Telah terverifikasi</option>
                            <option {{$user->status==3 ? 'selected':''}} value="3">Ada kesalahan pada berkas anda</option>
                        </select>
                    </div>

                @endif

                @if($user->status!=2)
                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                @endif
            </form>

        </div>
    </div>
</x-app-layout>
