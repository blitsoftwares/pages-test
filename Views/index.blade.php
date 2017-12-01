<h1>{{ trans('Page::pages.pages') }}</h1>

<ul>
@foreach($pages as $page)
    <li>{{ $page->title }}</li>
@endforeach
</ul>