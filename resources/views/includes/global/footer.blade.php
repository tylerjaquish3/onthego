<!-- footer content -->
<footer>
    <div class="center">
        <p>{{ config('app.name') }} v{{ env('APP_VERSION', '0.1') }} <span>|</span> @yield('footer-links') &copy; {{
        date('Y') }}</p>
    </div>
</footer>
<!-- /footer content -->