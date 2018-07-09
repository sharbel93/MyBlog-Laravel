@extends('main')
@section('title', '| About')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>About {{ $data['fullname'] }}</h1>
            <h5> My Email is {{ $data['email']  }}</h5>
            <p>
                Lorem ipsum dolor sit amet, sed donec et eros felis dolor massa. Duis et sollicitudin nibh in turpis. Suspendisse praesent nisl velit quisquam, gravida condimentum sed quam elementum aliquet, sed pretium donec, turpis nec donec, tortor fringilla facilisi velit. Nonummy magna erat aliquet sodales, vel arcu eu cras erat ut, pede ipsum ac luctus sit, non vitae sapien.

            </p>
        </div>
    </div>
</div>
@endsection
