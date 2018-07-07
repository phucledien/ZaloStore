@extends ('admin.layouts.master')

@section('content')
<div class="container-fluid">
    
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Broadcast</li>
      </ol>

  @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          {{ Session::get('success') }}
      </div>
  @endif

  <div class="card mb-3">
            <div class="card-header">
                Broadcast Message
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('messages.broadcast.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea type="text" class="form-control" id="message" rows="10" name="message" placeholder="Type message to broadcast here"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Send message</button>
                </form>
            </div>
        </div>
@endsection