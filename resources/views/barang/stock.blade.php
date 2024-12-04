@extends('layout.layouts')

@section('content')
<div class="container">
    <div id="msg-success"></div>
    <h1 class="mb-4">Ubah Stok Barang</h1>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok Saat Ini</th>
                <th class="text-center">Ubah Stok</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($barang as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                <td style="{{ $item['stock'] < 10 ? 'color: red' : ''}}">{{ $item['stock'] }}</td>
                <td>
                    <div onclick="edit({{$item['id']}})" class="btn btn-primary" style="cursor: pointer">Tambah Stock</div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal" tabindex="1" id="edit-stock">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-tittle">Ubah Stok Barang</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" id="form-stock">
                    @csrf   
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Barang:</label>
                            <input type="text" class="form-control" id="name" name="name" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Ubah Data Stock:</label>
                            <input type="number" class="form-control" id="stock" name="stock">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>  
                        <button type="submit" class="btn btn-primary"> Simpan Data Barang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    function edit(id){
        var url = "{{ route('barang.stock.edit', ':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function(response){
                $('#id').val(response.id);
                $('#name').val(response.name);
                $('#stock').val(response.stock);
                $('#edit-stock').modal('show');
            }
        })
    }

    $('#form-stock').submit(function(e){
    e.preventDefault();
    var id = $('#id').val();
    var url = "{{ route('barang.update.stock', ':id') }}";
    url = url.replace(':id', id);
    
    // Ambil nilai form untuk dikirim
    var data = {
        stock: $('#stock').val(),
        _token: '{{ csrf_token() }}'
    };
    
    $.ajax({
        type: 'PUT',
        url: url,
        data: data,
        cache: false,
        success: (data) => {
            $('#edit-stock').modal('hide');
            sessionStorage.reloadAfterPageLoad = true;
            window.location.reload();
        },
        error: function(data){
            $('#msg').attr('class', 'alert alert-danger');
            $('#msg').text(data.responseJSON.message); 
        }
    });
});

    </script>   
@endpush