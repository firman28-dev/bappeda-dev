@extends('partials.admin.master')

@section('title', 'Pegawai Bappeda')

@section('css')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/jquery.dataTables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dataTables.bootstrap5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/photoswipe.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">


@endsection

@section('style')
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>Pegawai Bappeda</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Gallery</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid datatable-init">
    <div class="card">
        <div class="card-header pb-0 card-no-border">
            <h5>Daftar Pegawai</h5>
        </div>
        <div class="card-body">
            {{-- <button class="btn btn-primary mx-auto mt-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModallogin"><i class="fa-solid fa-plus pe-1"></i>Tambah</button> --}}
            <div class="table-responsive custom-scrollbar state-saving-table">
                <table class="display border table-striped" id="basic-9" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Bidang</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_pns ?? '-' }}</td>
                                <td>{{ $item->nip ?? '-' }}</td>
                                <td>{{ $item->jabatan_nm ?? '-' }}</td>
                                <td>{{ $item->_bidang->name ?? '-' }}</td>
                                <td class="text-center" id="aniimated-thumbnials" itemscope="">
                                    @if ($item->path)
                                        <figure itemprop="associatedMedia" itemscope="">
                                            <a href="{{ asset('uploads/pegawai_bappeda/' . $item->path) }}" itemprop="contentUrl" data-size="1600x950">
                                                <img class="img-thumbnail w-50" src="{{ asset('uploads/pegawai_bappeda/' . $item->path) }}" itemprop="thumbnail" alt="Image description">
                                            </a>
                                        </figure>
                                    @else
                                        <img class="img-thumbnail w-50" src="{{ asset('assets_global/img/blank.png') }}" itemprop="thumbnail" alt="Image description">
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->status == 'A')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="action">
                                        <li class="edit"> 
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditGallery{{ $item->id }}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </li>

                                        {{-- Modal Edit Gallery --}}
                                        <div class="modal fade" id="modalEditGallery{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditGalleryLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content dark-sign-up">
                                                    <div class="modal-body social-profile text-start">
                                                        <div class="modal-toggle-wrapper">
                                                            <h3>Edit Data Pegawai</h3>
                                                            <p class="f-light">Silahkan perbarui gallery dan keterangan.</p>

                                                            <form class="row g-3 needs-validation theme-form"
                                                                action="{{ route('pegawai-bappeda.update', $item->id) }}"
                                                                method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="col-md-12">
                                                                    <label class="form-label" for="nama_pns{{ $item->id }}">Nama Pegawai</label>
                                                                    <input class="form-control" id="nama_pns{{ $item->id }}" name="nama_pns" type="text"
                                                                        value="{{ $item->nama_pns }}" required>
                                                                    @error('nama_pns')
                                                                        <div class="is-invalid">
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <label class="form-label" for="path{{ $item->id }}">Foto</label>
                                                                    <input class="form-control image-input" type="file" name="path" id="path{{ $item->id }}"
                                                                        accept="image/*">
                                                                    @error('path')
                                                                        <div class="is-invalid">
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <label class="form-label" for="bidang{{ $item->id }}">Pilih Bidang</label>
                                                                    <select class="form-select js-example-basic-single col-sm-12" name="bidang" id="bidang{{ $item->id }}">
                                                                        <option value="">-- Pilih Bidang --</option>
                                                                        @foreach ($bidang as $st)
                                                                            <option value="{{ $st->id }}"
                                                                                {{ $item->bidang == $st->id ? 'selected' : '' }}>
                                                                                {{ $st->label }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('bidang')
                                                                        <div class="is-invalid">
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="form-label" for="status{{ $item->id }}">Pilih Status</label>
                                                                    <select class="form-select js-example-basic-single col-sm-12" name="status" id="status{{ $item->id }}">
                                                                        <option value="">-- Pilih Status --</option>
                                                                        <option value="A" {{ $item->status == 'A' ? 'selected' : '' }}>Aktif</option>
                                                                        <option value="N" {{ $item->status == 'N' ? 'selected' : '' }}>Tidak</option>
                                                                    </select>
                                                                    @error('status')
                                                                        <div class="is-invalid">
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-12">
                                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <li class="delete">
                                            <a href="" data-bs-target="#confirmDelete{{ $item->id }}" data-bs-toggle="modal">
                                                <i class="fa-solid fa-trash-can" ></i>
                                            </a>
                                            <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="confirmDelete{{ $item->id }}">
                                                <form action="{{ route('pegawai-bappeda.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Apakah yakin ingin menghapus data?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submmit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                              
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

{{-- Modal --}}

<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-toggle-wrapper">
                    <ul class="modal-img">
                        <li> <img src="{{asset('assets/images/gif/danger.gif')}}" alt="error"></li>
                    </ul>
                    <h4 class="text-center pb-2">Terjadi Kesalahan Upload</h4>
                    <p class="text-center c-light">Ukuran File yang kamu upload maksimal 3 MB. Silahkan diulangi kembali
                        uploadnya</p>
                    <button class="btn btn-secondary d-flex m-auto" type="button" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/dataTables1.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom2.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable_advance.js') }}"></script>
<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    
<script src="{{ asset('assets/js/photoswipe/photoswipe.min.js') }}"></script>
<script src="{{ asset('assets/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('assets/js/photoswipe/photoswipe.js') }}"></script>
<script src="{{ asset('assets/js/custom-add-product4.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
<script>
    document.querySelectorAll('.image-input').forEach(function(input) {
        input.addEventListener('change', function () {
            const file = this.files[0];
            const maxSize = 3 * 1024 * 1024; // 3 MB

            if (file && file.size > maxSize) {
                this.value = ''; // reset input

                const modalElement = document.getElementById('exampleModalCenter1');
                const modal = new bootstrap.Modal(modalElement);
                modal.show();
            }
        });
    });
</script>




<script>
    // Inisialisasi Select2 setiap kali modal (tambah/edit) dibuka
    $('.modal').on('shown.bs.modal', function () {
        $(this).find('.js-example-basic-single').select2({
            dropdownParent: $(this)
        });
    });

    // Optional: destroy agar tidak duplikasi (jika error tetap muncul)
    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('.js-example-basic-single').select2('destroy');
    });
</script>

@endsection
