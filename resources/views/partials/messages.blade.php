@if (count($messages))
    <div classs="container p-5">
    @foreach ($messages as $message)
        @if ($message['level'] == 'danger')
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <i class="icon fas fa-times"></i>
                </button>
                <h5><i class="icon fas fa-ban"></i> {!! $message['title'] !!}</h5>
                {!! $message['message'] !!}
            </div>
        @endif
        @if ($message['level'] == 'warning')
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <i class="icon fas fa-times"></i>
                </button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> {!! $message['title'] !!}</h5>
                {!! $message['message'] !!}
            </div>
        @endif
        @if ($message['level'] == 'success')
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <i class="icon fas fa-times"></i>
                </button>
                <h5><i class="icon fas fa-check"></i> {!! $message['title'] !!}</h5>
                {!! $message['message'] !!}
            </div>
        @endif
        @if ($message['level'] == 'info')
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <i class="icon fas fa-times"></i>
                </button>
                <h5><i class="icon fas fa-info"></i> {!! $message['title'] !!}</h5>
                {!! $message['message'] !!}
            </div>
        @endif
    @endforeach
    
    </div>
@endif




