<p class="mt-8 text-center text-xs text-80">
    &copy; {{ date('Y') }} The Captain's Club
    <span class="px-1">&middot;</span>
    v{{ env('APP_VERSION') }}
    <span class="px-1">&middot;</span>
    v{{ \Laravel\Nova\Nova::version() }}
</p>
