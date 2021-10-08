// activate event
const staticCacheName = 'site-static';
const assets = [
    '/',
    'index.php',
    'dashboard.php',
    'includes/sidenav.php',
    'includes/header.php',
    'includes/topnav.php',
    'js/app.js',
    'css/sb-admin-2.min.css',
    'img/logo.png',
    'vendor/fontawesome-free/css/all.min.css',
    'vendor/datatables/dataTables.bootstrap4.min.css',
    'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i',
    'vendor/fontawesome-free/webfonts/fa-solid-900.woff2'

];
//install service worker
self.addEventListener('install', evt => {
    evt.waitUntill(
    caches.open(staticCacheName).then(cache => {
        console.log('caching shell assets');
        cache.addAll(assets);
    })
    );
});
self.addEventListener('activate', evt => {
    // console.log('service worker has been activated');

});

// fetch event

self.addEventListener('fetch', evt => {
    // console.log('fetch event', evt);
    evt.respondWith(
        caches.match(evt.request).then(cacheRes => {
            return cacheRes || fetch(evt.request);
        })
    );
});
