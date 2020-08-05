<div class="[ large-image-and-text ] [ split-pair {{ $block->input('orientation') == 'right' ? '' : 'split-pair--reverse' }} ]">
    <div><!--split-pair-wrapper -->
            <div class="measure flow-s1">
                {!! $block->input('body_text') !!}
            </div>

            <figure>
                <img src="{{$block->lowQualityImagePlaceholder('aside_image', 'default')}}"
                     data-src="{{ $block->image('aside_image', 'default') }}"
                     alt="{{ $block->input('caption') ?? $block->imageAltText('aside_image')}}"
                     loading="lazy"
                     class="lazy"
                     width="632"
                     height="421"
                />
                <figcaption  class="text-s-1">{{ $block->input('caption') }}</figcaption>
            </figure>
    </div>
</div>


