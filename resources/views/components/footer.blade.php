<footer class="justify-self-end">
    <div class="py-sm">
        <x-max-width>
            <x-navigation.footer-menu />

            <p class="text-sm">
                &copy  {{ \Carbon\Carbon::now()->format('Y') }}</br>
                <a href="https://cwsdigital.com">website by CWS</a>
            </p>
        </x-max-width>
    </div>
</footer>
