@extends('main')
@section('title', '| Homepage')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to My Blog</h1>
                <p class="lead">
                    Thank You so much for visiting. This is my test website built with Laravel. Please read my Popular
                    post!
                </p>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
                {{--.row>.col-md-8--}}
            </div>
        </div>
    </div>
    {{--  end of header .row--}}

    <div class="row">
        <div class="col-md-8">
            <div class="post">
                <h3>Post Title</h3>
                <p> Lorem ipsum dolor sit amet, sed donec et eros felis dolor massa. Duis et sollicitudin nibh in
                    turpis. Suspendisse praesent nisl velit quisquam, gravida condimentum sed quam elementum aliquet,
                    sed pretium donec, turpis nec donec, tortor fringilla facilisi velit. Nonummy magna erat aliquet
                    sodales, vel arcu eu cras erat ut, pede ipsum ac luctus sit, non vitae sapien.
                </p>

                <a href="#" class="btn btn-primary">Read More </a>
            </div>

            <hr>
            <div class="post">
                <h3>Post Title</h3>
                <p> Lorem ipsum dolor sit amet, sed donec et eros felis dolor massa. Duis et sollicitudin nibh in
                    turpis. Suspendisse praesent nisl velit quisquam, gravida condimentum sed quam elementum aliquet,
                    sed pretium donec, turpis nec donec, tortor fringilla facilisi velit. Nonummy magna erat aliquet
                    sodales, vel arcu eu cras erat ut, pede ipsum ac luctus sit, non vitae sapien.
                </p>

                <a href="#" class="btn btn-primary">Read More </a>
            </div>

            <hr>
            <div class="post">
                <h3>Post Title</h3>
                <p> Lorem ipsum dolor sit amet, sed donec et eros felis dolor massa. Duis et sollicitudin nibh in
                    turpis. Suspendisse praesent nisl velit quisquam, gravida condimentum sed quam elementum aliquet,
                    sed pretium donec, turpis nec donec, tortor fringilla facilisi velit. Nonummy magna erat aliquet
                    sodales, vel arcu eu cras erat ut, pede ipsum ac luctus sit, non vitae sapien.
                </p>

                <a href="#" class="btn btn-primary">Read More </a>
            </div>

            <hr>

            <div class="post">
                <h3>Post Title</h3>
                <p>
                    Lorem ipsum dolor sit amet, sed donec et eros felis dolor massa. Duis et sollicitudin nibh in
                    turpis. Suspendisse praesent nisl velit quisquam, gravida condimentum sed quam elementum aliquet,
                    sed pretium donec, turpis nec donec, tortor fringilla facilisi velit. Nonummy magna erat aliquet
                    sodales, vel arcu eu cras erat ut, pede ipsum ac luctus sit, non vitae sapien.
                </p>

                <a href="#" class="btn btn-primary">Read More </a>
            </div>
        </div>

        <div class="col-md-3 offset-md-1">

            side bar

            <p>
                Lorem ipsum dolor sit amet, sed donec et eros felis dolor massa. Duis et sollicitudin nibh in
                turpis. Suspendisse praesent nisl velit quisquam, gravida condimentum sed quam elementum aliquet,
                sed pretium donec, turpis nec donec, tortor fringilla facilisi velit. Nonummy magna erat aliquet
                sodales, vel arcu eu cras erat ut, pede ipsum ac luctus sit, non vitae sapien.
            </p>

        </div>
    </div>
@endsection