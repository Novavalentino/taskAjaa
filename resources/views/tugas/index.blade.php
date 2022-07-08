@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Tugas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tugas.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Tugas</th>
            <th>Tipe Tugas</th>
            <th>Keterangan</th>
            <th>Deadline</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tugas as $tuga)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $tuga->namatugas }}</td>
            <td>{{ $tuga->tipetugas }}</td>
            <td>{{ $tuga->keterangan }}</td>
            <td>{{ $tuga->deadline }}</td>
            <td>
                <form action="{{ route('tugas.destroy',$tuga->id) }}" method="POST">
           
                    <!-- <a class="btn btn-primary" href="{{ route('tugas.edit',$tuga->id) }}">Edit</a> -->
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Done</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $tugas->links() !!}
        
@endsection