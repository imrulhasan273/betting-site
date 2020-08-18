<div style="text-align: center">
    @if(session()->has('message'))
    <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>{{ session()->get('message')}} </div>
    {{ session()->forget('message') }}
    @elseif(session()->has('error'))
    <div class="alert alert-danger">{{ session()->get('error')}} </div>
    @endif
</div>
