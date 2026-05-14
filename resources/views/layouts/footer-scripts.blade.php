<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/vendors/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/vendors/vanilla-lazyload/lazyload.min.js') }}"></script>
<script src="{{ asset('assets/vendors/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/vendors/lightgallery/lightgallery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/lightgallery/plugins/zoom/lg-zoom.min.js') }}"></script>
<script src="{{ asset('assets/vendors/lightgallery/plugins/thumbnail/lg-thumbnail.min.js') }}"></script>
<script src="{{ asset('assets/vendors/lightgallery/plugins/video/lg-video.min.js') }}"></script>
<script src="{{ asset('assets/vendors/lightgallery/plugins/vimeoThumbnail/lg-vimeo-thumbnail.min.js') }}"></script>
<script src="{{ asset('assets/vendors/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendors/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/vendors/gsap/gsap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/gsap/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('assets/vendors/gsap/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('assets/vendors/mapbox-gl/mapbox-gl.js') }}"></script>
<script src="{{ asset('assets/js/theme.min.js') }}"></script>
<script>
	(function () {
		var STORAGE_KEY = 'mdm-theme';

		function syncThemeIcons() {
			var dark = document.documentElement.getAttribute('data-bs-theme') === 'dark';
			document.querySelectorAll('.theme-icon-when-light').forEach(function (el) {
				el.classList.toggle('d-none', dark);
			});
			document.querySelectorAll('.theme-icon-when-dark').forEach(function (el) {
				el.classList.toggle('d-none', !dark);
			});
		}

		function setTheme(mode) {
			document.documentElement.setAttribute('data-bs-theme', mode);
			try {
				localStorage.setItem(STORAGE_KEY, mode);
			} catch (e) {}
			syncThemeIcons();
		}

		document.addEventListener('DOMContentLoaded', function () {
			syncThemeIcons();
			var btn = document.getElementById('header-theme-toggle');
			if (!btn) return;
			btn.addEventListener('click', function () {
				var next = document.documentElement.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
				setTheme(next);
			});
		});
	})();
</script>
