@extends('layouts.admin')

@section('styles')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<!-- Page Heading -->

<h1 class="h3 mb-2 text-gray-800">Investment</h1>
   
@if (session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<!-- DataTales Example -->

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <a href="{{ route('admin.inverstment.create') }}" class="btn btn-success">Create Investment</a>

    </div>

    <div class="card-body col-md-8">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>

                    <tr>

                        <th>No.</th>

                        <th>Cover</th>

                        <th>Client</th>

                        <th>Project Date</th>

                        <th>Option</th>

                    </tr>

                </thead>

                <tbody>

                @php
                
                $no=0;
                
                @endphp
                
                @foreach ($inverstment as $inverstment)
                     
                    <tr> 
             
                        <td>{{ ++$no }}</td>  
                
                        <td>
                        
                            <img src="{{ asset('storage/'.$inverstment->cover) }}" alt="" style="height: 100px; width: 200px">
                        
                        </td> 
                        
                        <td>{{ $inverstment->client }}</td>

                        <td>{{ $inverstment->date }}</td>
                
                        <td>    
                
                            <a href="{{route('admin.inverstment.edit', [$inverstment->id])}}" class="btn btn-info btn-sm"> Edit </a>
                
                            <form method="POST" action="{{route('admin.inverstment.destroy', [$inverstment->id])}}" class="d-inline" onsubmit="return confirm('Delete this investment permanently?')">
                
                                @csrf
                
                                <input type="hidden" name="_method" value="DELETE">
                
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                
                            </form>
                
                        </td>
            
                    </tr>
            
                    @endforeach
        
                </tbody>
    
            </table>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>

@endpush