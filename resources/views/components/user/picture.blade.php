<section {{ $attributes->class([ 'user__avatar__container' ]) }}>
    @if(is_null($picture) || !isset($picture))
        <img class="user__avatar" src="{{ Vite::image('user.webp') }}" alt="Profile picture" />
    @else
        <img class="user__avatar" src="{{ asset($picture) }}" alt="Profile picture" />
    @endif
</section>
