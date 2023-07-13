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
                <p>First Name: {{ $appointment->user->name }}</p>
                </h4>
                <h4 class="mt-0">
                <p>Last Name: {{ $appointment->last_name }}</p>
                </h4>

                <h4 class="mt-0">
                <p>User Email: {{ $appointment->email }}</p>
                </h4>

                <h4 class="mt-0">
                <p>Phone: {{ $appointment->phone }}</p>
                </h4>

                <h4 class="mt-0">
                <p>Address: {{ $appointment->address }}</p>
                </h4>

                <h4 class="mt-0">
                <p>Zip: {{ $appointment->zip }}</p>
                </h4>

                <h4 class="mt-0">
                <p>Zip: {{ $appointment->city }}</p>
                </h4>

                <h4 class="mt-0">
                <p>Date: {{ $appointment->date }}</p>
                </h4>

                <h4 class="mt-0">
                <p>Date: {{ $appointment->time }}</p>
                </h4>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
                                    
    </div> <!-- end row -->
</div> <!-- end col -->

                            
@endsection