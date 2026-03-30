@extends('partials.guest.index')
@section('content') 

    <div class="bg-content-page py-20 justify-content-center text-center">
        <h1 class="display-6 text-white text-center fw-bold position-relative d-inline-block"
            style="padding-bottom: 0.5rem;">
            Pejabat Struktural 
            <span class="span-custom"></span>
        </h1>
    </div>
    <div class="container p-20">
        <div class="row mb-10">
            <div class="col-lg-5">
                <h1>Pimpinan</h1>
                <p class="lead">Badan Perencanaan Pembangunan Sumatera Barat dipimpin oleh seorang Kepala Badan.</p>
            </div>
            <div class="col-lg-1">
            </div>
            <div class="col-lg-6">
                 @php
                    $kaban = $pejabat->where('group_id',2)->first();
                @endphp
                <a href="{{route('guest.showpejabat',$kaban->id)}}"  class="text-dark">
                    <div class="card rounded-custom hover-scale">
                        <div class="card-body">
                            <div class="position-relative mb-3">
                                @if ($kaban->path)
                                    <img src="{{ asset('uploads/pejabat/' . $kaban->path) }}" class="card-img-top w-50" alt="News Image" style="object-fit: cover;">
                                @else
                                    <img src="https://kemenpar.go.id/_next/image?url=https%3A%2F%2Fapi.kemenpar.go.id%2Fstorage%2Fapp%2Fuploads%2Fpublic%2F679%2F1ca%2Fb06%2F6791cab06b87e394207864.png&w=1920&q=75" class="card-img-top img-hover-zoom" alt="News Image" style="height: 300px; object-fit: cover;">
                                @endif
                            </div>
                            <h2>{{$kaban->name}}</h2>
                            <p>{{$kaban->_group->ket}}</p>
                            {{-- <a href="{{ asset('lhkpn/LHKPN_KABAN.pdf') }}"target="_blank">
                                Lihat LHKPN
                            </a> --}}
                        </div>
                    </div>
                </a>
                
            </div>
        </div>
        <div class="row mb-6">
            <div class="col-lg-12 mb-3">
                <h1>Kepala Bidang</h1>
                <p class="lead">Kepala Bidang pada Badan Perencanaan Pembangunan Daerah Sumatera Barat terdapat 5 bidang, yaitu.</p>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    @php
                        $kabid = $pejabat->where('group_id',1);
                    @endphp
                    @if ($kabid)
                         @foreach ($kabid as $item)
                            <div class="col-lg-4">
                                <a href="{{route('guest.showpejabat',$item->id)}}" class="text-dark">
                                    <div class="card rounded-custom hover-scale">
                                        <div class="card-body">
                                            <div class="position-relative mb-2">
                                                @if ($item->path)
                                                <img src="{{ asset('uploads/pejabat/' . $item->path) }}" class="card-img-top w-50" alt="News Image" style="object-fit: cover;">
                                                @else
                                                    <img src="https://kemenpar.go.id/_next/image?url=https%3A%2F%2Fapi.kemenpar.go.id%2Fstorage%2Fapp%2Fuploads%2Fpublic%2F679%2F1ca%2Fb06%2F6791cab06b87e394207864.png&w=1920&q=75" class="card-img-top img-hover-zoom" alt="News Image" style="height: 300px; object-fit: cover;">
                                                @endif
                                            </div>
                                            <h2>{{$item->name}}</h2>
                                            <p>
                                                @if ($item->bidang_id != 5)
                                                    {{ $item->_group->ket }}
                                                @endif
                                                {{ $item->_bidang->name ?? '' }}
                                            </p>
                                            
                                        </div>
                                    </div>
                                </a>
                                
                            </div>
                        @endforeach
                    @endif
                   
                    
                </div>
            </div>
        </div>

        <div class="row mb-6">
            <div class="col-lg-12 mb-3">
                <h1>Kepala Sub Bagian</h1>
                <p class="lead">Kepala Sub Bidang pada Badan Perencanaan Pembangunan Daerah Sumatera Barat terdapat 2 pada Bidang Sekretariat, yaitu.</p>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    @php
                        $kasubid = $pejabat->where('group_id',5);
                    @endphp
                    @if ($kasubid)
                         @foreach ($kasubid as $item)
                            <div class="col-lg-4">
                                <a href="{{route('guest.showpejabat',$item->id)}}"  class="text-dark">
                                    <div class="card rounded-custom hover-scale">
                                        <div class="card-body">
                                            <div class="position-relative mb-2">
                                                @if ($item->path)
                                                    <img src="{{ asset('uploads/pejabat/' . $item->path) }}" class="card-img-top w-50" alt="News Image" style="object-fit: cover;">
                                                @else
                                                    <img src="https://kemenpar.go.id/_next/image?url=https%3A%2F%2Fapi.kemenpar.go.id%2Fstorage%2Fapp%2Fuploads%2Fpublic%2F679%2F1ca%2Fb06%2F6791cab06b87e394207864.png&w=1920&q=75" class="card-img-top img-hover-zoom" alt="News Image" style="height: 300px; object-fit: cover;">
                                                @endif
                                            </div>
                                            <h1>{{$item->name}}</h1>
                                            <p class="lead">{{$item->_group->ket}} {{$item->subid}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    
</script>
@endsection