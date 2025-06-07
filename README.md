# Laravel PWA Starter

This is a simple Laravel PWA (Progressive Web App) starter project. It includes the basic configuration needed to make your Laravel application work as a Progressive Web App.

## Features

- Service Worker for offline support
- Web App Manifest
- Installable on mobile and desktop devices
- Offline page

## Setup Instructions

1. Clone or download this repository
2. Install Laravel dependencies:
   ```
   composer install
   ```
3. Copy `.env.example` to `.env` and configure your database:
   ```
   cp .env.example .env
   ```
4. Generate application key:
   ```
   php artisan key:generate
   ```
5. Generate PWA icons:
   - Visit `http://localhost/path-to-your-app/public/icons/generate-icons.php` to generate placeholder icons
   - Or replace with your own custom icons in the `/public/icons/` directory

## PWA Components

### Manifest

The web app manifest is located at `/public/manifest.json`. You can customize it to match your application's name, colors, and other properties.

### Service Worker

The service worker is located at `/public/sw.js`. It handles:
- Caching of application assets
- Offline functionality
- Serving cached content when offline

### Offline Page

A simple offline page is included at `/resources/views/offline.blade.php`. This page is shown when the user is offline and tries to access a page that isn't cached.

## Testing PWA Features

To test the PWA features:

1. Run your Laravel application with a web server (Apache, Nginx, or Laravel's built-in server)
2. Open the application in Chrome or another modern browser
3. Open Developer Tools (F12)
4. Go to the "Application" tab
5. Check the "Manifest" and "Service Workers" sections to verify everything is working correctly
6. Test offline functionality by turning off your network connection

## Customization

- Update the `manifest.json` file to customize app name, colors, and icons
- Modify the `sw.js` file to adjust caching strategies
- Customize the offline page in `resources/views/offline.blade.php`

## Production Deployment

For production deployment, make sure to:

1. Generate proper icons for your application
2. Update the manifest.json with your application's details
3. Configure proper HTTPS, as service workers require a secure context

## License

This Laravel PWA starter is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
