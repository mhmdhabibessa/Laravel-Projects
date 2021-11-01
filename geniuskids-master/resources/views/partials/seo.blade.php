<title>
    {{ __('Genius Kids') }} | {{ $meta_title ?? $og_title ?? null }}
</title>
<meta name="description" content="{{ $meta_description ?? $og_description ?? null }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ URL::current() }}">
<meta property="og:title" content="{{ $og_title ?? $meta_title ?? null }}">
<meta property="og:description" content="{{ $og_description ?? $meta_description ?? null }}">
<meta property="og:image" content="{{ $image ?? null }}">
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ URL::current() }}">
<meta property="twitter:title" content="{{ $og_title ?? $meta_title ?? null }}">
<meta property="twitter:description" content="{{ $og_description ?? $meta_description ??  null }}">
<meta property="twitter:image" content="{{ $image ?? null }}">
