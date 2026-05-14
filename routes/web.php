<?php

use App\Models\AboutPage;
use App\Models\Blog;
use App\Models\ContactPage;
use App\Models\ContactMessage;
use App\Models\HomePage;
use App\Models\LegalPage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    $about = Cache::remember(
        AboutPage::CACHE_KEY,
        AboutPage::CACHE_TTL_SECONDS,
        fn () => AboutPage::query()->firstOrFail()
    );

    $home = Cache::remember(
        HomePage::CACHE_KEY,
        HomePage::CACHE_TTL_SECONDS,
        fn () => HomePage::query()->firstOrFail()
    );

    return view('about', compact('about', 'home'));
})->name('about');

Route::get('/contact', function () {
    $contact = Cache::remember(
        ContactPage::CACHE_KEY,
        ContactPage::CACHE_TTL_SECONDS,
        fn () => ContactPage::query()->firstOrFail()
    );

    return view('contact', compact('contact'));
})->name('contact');

Route::get('/privacy-policy', function () {
    $page = Cache::remember(
        LegalPage::cacheKey('privacy'),
        LegalPage::CACHE_TTL_SECONDS,
        fn () => LegalPage::query()->where('key', 'privacy')->firstOrFail()
    );

    return view('legal', compact('page'));
})->name('privacy');

Route::get('/terms-conditions', function () {
    $page = Cache::remember(
        LegalPage::cacheKey('terms'),
        LegalPage::CACHE_TTL_SECONDS,
        fn () => LegalPage::query()->where('key', 'terms')->firstOrFail()
    );

    return view('legal', compact('page'));
})->name('terms');

Route::post('/contact', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string|max:5000',
    ]);

    $contact = Cache::remember(
        ContactPage::CACHE_KEY,
        ContactPage::CACHE_TTL_SECONDS,
        fn () => ContactPage::query()->firstOrFail()
    );

    $contactMessage = ContactMessage::query()->create([
        'name' => (string) $request->string('name'),
        'email' => (string) $request->string('email'),
        'message' => (string) $request->string('message'),
        'ip_address' => (string) ($request->ip() ?? ''),
        'user_agent' => (string) $request->userAgent(),
        'submitted_at' => now(),
    ]);

    $to = filled($contact->email) ? (string) $contact->email : (string) config('mail.from.address');
    if ($to !== '') {
        Mail::to($to)->send(new \App\Mail\ContactMessageSubmitted($contactMessage));
    }

    $redirectTo = trim((string) $request->input('redirect_to', ''));
    if ($redirectTo !== '') {
        return redirect()->to($redirectTo)->with('contact_sent', true);
    }

    return redirect()->route('contact')->with('contact_sent', true);
})->name('contact.submit');

Route::get('/', function () {
    $home = Cache::remember(
        HomePage::CACHE_KEY,
        HomePage::CACHE_TTL_SECONDS,
        fn () => HomePage::query()->firstOrFail()
    );

    $contact = Cache::remember(
        ContactPage::CACHE_KEY,
        ContactPage::CACHE_TTL_SECONDS,
        fn () => ContactPage::query()->firstOrFail()
    );

    $featuredProducts = Product::query()
        ->where('is_featured', true)
        ->orderBy('featured_sort')
        ->orderByDesc('id')
        ->get();

    $blogs = Blog::query()
        ->where(function ($q) {
            $q->whereNull('published_at')->orWhere('published_at', '<=', now());
        })
        ->orderByDesc('id')
        ->limit(12)
        ->get();

    return view('home', compact('featuredProducts', 'home', 'blogs', 'contact'));
});

Route::get('/blogs', function () {
    $search = trim((string) request('search', ''));
    $category = trim((string) request('category', ''));
    $tag = trim((string) request('tag', ''));

    $baseQuery = Blog::query()
        ->where(function ($q) {
            $q->whereNull('published_at')->orWhere('published_at', '<=', now());
        });

    $blogsQuery = (clone $baseQuery)
        ->when($search !== '', function ($q) use ($search) {
            $like = '%'.$search.'%';
            $q->where(function ($qq) use ($like) {
                $qq->where('title', 'like', $like)
                    ->orWhere('description', 'like', $like)
                    ->orWhere('content', 'like', $like);
            });
        })
        ->when($category !== '', fn ($q) => $q->where('category', $category))
        ->when($tag !== '', function ($q) use ($tag) {
            $q->whereJsonContains('tags', $tag);
        })
        ->orderByDesc('published_at')
        ->orderByDesc('id');

    $blogs = $blogsQuery->paginate(6)->withQueryString();

    $categories = (clone $baseQuery)
        ->whereNotNull('category')
        ->where('category', '!=', '')
        ->select('category')
        ->distinct()
        ->orderBy('category')
        ->pluck('category')
        ->values();

    $tags = (clone $baseQuery)
        ->whereNotNull('tags')
        ->get()
        ->flatMap(fn (Blog $b) => is_array($b->tags) ? $b->tags : [])
        ->map(fn ($t) => trim((string) $t))
        ->filter()
        ->unique()
        ->sort()
        ->values();

    $recentPosts = (clone $baseQuery)
        ->orderByDesc('published_at')
        ->orderByDesc('id')
        ->limit(6)
        ->get();

    return view('blogs.index', compact('blogs', 'categories', 'tags', 'recentPosts', 'search', 'category', 'tag'));
})->name('blogs.index');

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    $blog->increment('views');

    $search = trim((string) request('search', ''));

    $recentPosts = Blog::query()
        ->where(function ($q) {
            $q->whereNull('published_at')->orWhere('published_at', '<=', now());
        })
        ->orderByDesc('published_at')
        ->orderByDesc('id')
        ->limit(6)
        ->get();

    $categories = Blog::query()
        ->whereNotNull('category')
        ->where('category', '!=', '')
        ->select('category')
        ->distinct()
        ->orderBy('category')
        ->pluck('category')
        ->values();

    $tags = Blog::query()
        ->whereNotNull('tags')
        ->get()
        ->flatMap(fn (Blog $b) => is_array($b->tags) ? $b->tags : [])
        ->map(fn ($t) => trim((string) $t))
        ->filter()
        ->unique()
        ->sort()
        ->values();

    $relatedPosts = Blog::query()
        ->whereKeyNot($blog->getKey())
        ->when(filled($blog->category), fn ($q) => $q->where('category', $blog->category))
        ->where(function ($q) {
            $q->whereNull('published_at')->orWhere('published_at', '<=', now());
        })
        ->orderByDesc('published_at')
        ->orderByDesc('id')
        ->limit(9)
        ->get();

    if ($search !== '') {
        $like = '%'.$search.'%';
        $recentPosts = Blog::query()
            ->where(function ($q) {
                $q->whereNull('published_at')->orWhere('published_at', '<=', now());
            })
            ->where(function ($q) use ($like) {
                $q->where('title', 'like', $like)
                    ->orWhere('description', 'like', $like)
                    ->orWhere('content', 'like', $like);
            })
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->limit(12)
            ->get();
    }

    return view('blog_details', compact('blog', 'recentPosts', 'categories', 'tags', 'relatedPosts', 'search'));
})->name('blogs.show');

Route::get('/products', function () {
    $search = trim((string) request('q', ''));

    $products = Product::query()
        ->when($search !== '', function ($query) use ($search) {
            $like = '%'.$search.'%';
            $query->where(function ($q) use ($like) {
                $q->where('title', 'like', $like)
                    ->orWhere('slug', 'like', $like);
            });
        })
        ->orderBy('title')
        ->get();

    return view('products', compact('products', 'search'));
})->name('products');

Route::get('/products/{product:slug}', function (Product $product) {
    $relatedProducts = Product::query()
        ->whereKeyNot($product->getKey())
        ->orderByDesc('is_featured')
        ->orderBy('title')
        ->limit(4)
        ->get();

    return view('products_details', compact('product', 'relatedProducts'));
})->name('products.show');

Route::redirect('/login', '/admin/login');
