@extends('layouts.backend.main')
@push('css')
       
@endpush
@section('content')


                            
<br>
<br>
 <div class="row">
   <div class="col-sm-6">
        <div class="card widget-flat">
            <div class="card-body">
                <h4 class="mt-0">
                <p>User Name: {{ $contact->name }}</p>
                </h4>
                <h4 class="mt-0">
                <p>User Email: {{ $contact->email }}</p>
                </h4>
                <h4 class="mt-0">
                <p>Message:</p>
                </h4>
                <p class="text-muted font-13 my-3">{{ $contact->message }}
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
                                    
    </div> <!-- end row -->
</div> <!-- end col -->

                            
@endsection