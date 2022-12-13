@extends('admin.layout.main')

@section('title','dashboard')

@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6  subheader-transparent " id="kt_subheader">
        <div
            class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">

                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">
                        Dashboard </h5>
                    <!--end::Page Title-->

                </div>
                <!--end::Page Heading-->
            </div>
 
        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container" style="max-width: 1260px">
            <div class="row">
                <div class="col-md-8">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact p-3">
                        <div class="card-header">
                            <h3 class="card-title">
                                Jenis Minuman
                            </h3>
                        </div>
                        <table id="myTable" class="display" style="border: 1px solid rgba(0, 0, 0, 0.3); border-radius:0.42rem">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Jenis</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach($minumans as $minuman)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><img src="{{ asset('storage/'.$minuman->gambar) }}" alt="" width="80px" height="80px"></td>
                                    <td>{{ $minuman->nama }}</td>
                                    <td>{{ $minuman->kategori->nama }}</td>
                                    <td>{{ $minuman->pilihan }}</td>
                                    <td>{{ $minuman->harga }}</td>
                                    <td>                                
                                        <a class="edit" href="{{ url('admin/minuman/edit/'.$minuman->id) }}">Edit </a> |
                                        <a class="batal" href="{{ route("Admin.Minuman.Delete",["id"=>$minuman->id]) }}"  onclick="return confirm('yakin menghapus kategori ini?');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end::Card-->
                </div>
                <div class="col-md-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact p-3">
                        <div class="card-header">
                            <h3 class="card-title">
                                Kategori Minuman
                            </h3>
                        </div>
                        <table id="myTable2" class="display" style="border: 1px solid rgba(0, 0, 0, 0.3);">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori Minuman </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach($kategoris as $kategori)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $kategori->nama }}</td>
                                    <td>
                                        <a class="edit" href="{{ url("admin/kategori/edit/".$kategori->id) }}">Edit </a> |
                                        <a a class="batal" href="{{ route("Admin.Kategori.Delete",["id"=>$kategori->id]) }}"  onclick="return confirm('yakin menghapus kategori ini?');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
@endsection
@push('script')
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    $(document).ready( function () {
         $('#myTable2').DataTable();
    } );
</script>
@endpush