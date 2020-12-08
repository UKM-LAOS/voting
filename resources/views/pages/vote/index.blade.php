<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div>
        </div>
    </x-slot>

    <div class="section-body">
        <h2 class="section-title">Pilih Calon yang Anda Kehendaki</h2>
        <p class="section-lead">Klik pilih pada calon yang anda ingin pilih</p>

        <div class="row">
            @foreach($candidates as $c)
            <div class="col-12 col-sm-6 col-md-6">
                <article class="article">
                    <div class="article-header" style="height: 350px">
                        <div class="article-image" data-background="{{asset('storage/candidate/'.$c->image)}}">
                        </div>
                        <div class="article-title">
                            <h2><a href="#">{{$c->name}}</a></h2>
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-cta">
                            <a onclick="if (confirm('Apakah anda yakin memilih {{$c->name}}')){ window.location.href = '{{route('admin.vote-candidate.show',$c->id)}}'; }" class="btn btn-primary btn-lg" style="width: 100%">Pilih</a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
