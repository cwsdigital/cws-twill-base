<div class="[ small-image-and-text  {{ $block->input('orientation') == 'right' ? 'small-image-and-text--reverse' : '' }} ]">
    <div><!--split-pair-wrapper -->

        <div>
            <figure>
                <img
                     src="{{ $block->lowQualityImagePlaceholder('aside_image', 'default') }}"
                     data-src="{{ $block->image('aside_image', 'default') }}"
                     alt="{{ $block->input('caption') ?? $block->imageAltText('aside_image')}}"
                     class="rounded lazy"
                     loading="lazy"
                     width="256"
                     height="256"
                />
                <figcaption>{{ $block->input('caption') }}</figcaption>
            </figure>
        </div>


        <div class="measure flow-s1">
            {!! $block->input('body_text') !!}
        </div>
    </div>
</div>


