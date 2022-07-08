@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tugas.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
    <form action="{{ route('tugas.update',$tugas->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

        @method('PUT')
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Tugas</strong>
                    <input type="text" name="namatugas" class="form-control" placeholder="Namatugas" value="{{$tuga->namatugas}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Tugas</strong>
                    <select class="form-control" name="tipetugas">
                        @foreach($jenistugas as $jenistuga)
                        <option value="{{$jenistuga->tipetugas}}" @if($tuga->tipetugas == $jenistuga->tipetugas)selected @endif>{{$jenistuga->tipetugas}}</option>
                        @endforeach
                    </select>              
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan</strong>
                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="{{$tuga->keterangan}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deadline</strong>
                    <input type="text" name="deadline" class="form-control" placeholder="Deadline" value="{{$tuga->deadline}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>   
    </form>
@endsection