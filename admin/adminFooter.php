		</div>
    </div>
</div>

<!-- footer content -->
<footer>
    <div class="center">
        <p>{{ config('app.name') }} v{{ env('APP_VERSION', '0.1') }} <span>|</span> @yield('footer-links') &copy; {{
        date('Y') }}</p>
    </div>
</footer>
<!-- /footer content -->

<!-- Sparkle Combined Scripts -->
<script src="/js/sparkle.js"></script>
<script src="/js/dataTables.min.js"></script>
<script src='https://cdn.ckeditor.com/ckeditor5/11.2.0/decoupled-document/ckeditor.js'></script>

</body>
</html>