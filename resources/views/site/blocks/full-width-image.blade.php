<figure class=" [ full-width-image ] [ flow-s0 ]">
    <img src="{{ $block->lowQualityImagePlaceholder('full_image', 'default') }}"
         data-src="{{ $block->image('full_image', 'default') }}"
         alt="{{ $block->input('caption') ?? $block->imageAltText('full_image') }}"
         class="lazy"
         loading="lazy"
         width="960"
         height="369"
    />
    <figcaption class="text-s-1">{{ $block->input('caption') }}</figcaption>
</figure>
