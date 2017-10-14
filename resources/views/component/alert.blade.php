<div class="alert alert-{{ $alertType or 'primary' }} alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    {{ $slot }}
</div>