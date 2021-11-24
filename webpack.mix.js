const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
   .styles([
      'resources/css/layouts/master.css',
      'resources/css/layouts/header.css',
      'resources/css/layouts/footer.css',
      'resources/css/auth/master.css',
      'resources/css/auth/login.css',
      'resources/css/components/books-card.css',
      'resources/css/components/pagination.css',
      'resources/css/pages/index.css',
      'resources/css/pages/about/index.css',
      'resources/css/pages/notifications/index.css',
      'resources/css/pages/notifications/read.css',
      'resources/css/pages/account/activities.css',
      'resources/css/pages/account/booked-books.css',
      'resources/css/pages/account/liked-books.css',
      'resources/css/pages/account/presentation.css',
      'resources/css/pages/account/profile.css',
      'resources/css/pages/account/read-books.css',
      'resources/css/pages/account/readers.css',
      'resources/css/pages/account/sidebar.css',
      'resources/css/pages/activities/index.css',
      'resources/css/pages/activities/read.css',
      'resources/css/pages/books/index.css',
      'resources/css/pages/books/read.css',
      'resources/css/pages/presentations/index.css',
      'resources/css/pages/ratings/active-reader.css',
      'resources/css/pages/ratings/disciplined-reader.css',
      'resources/css/pages/ratings/popular-book.css',
      'resources/css/pages/ratings/proactive-member.css',
      'resources/css/pages/ratings/reading-company.css',
      'resources/css/pages/ratings/sidebar.css',
      'resources/css/pages/rules/index.css',
      'resources/css/pages/users/index.css',
      'resources/css/pages/users/read.css',
   ], 'public/css/app.css')

   .styles([
      'resources/css/dashboard/master.css',
      'resources/css/dashboard/sidebar.css',
      'resources/css/components/pagination.css',
      'resources/css/dashboard/activities/index.css',
      'resources/css/dashboard/activities/create.css',
      'resources/css/dashboard/activities/read.css',
      'resources/css/dashboard/activities/update.css',
      'resources/css/dashboard/books/index.css',
      'resources/css/dashboard/books/create.css',
      'resources/css/dashboard/books/read.css',
      'resources/css/dashboard/banners/index.css',
      'resources/css/dashboard/banners/create.css',
      'resources/css/dashboard/banners/read.css',
      'resources/css/dashboard/companies/index.css',
      'resources/css/dashboard/presentations/index.css',
      'resources/css/dashboard/presentations/create.css',
      'resources/css/dashboard/presentations/read.css',
      'resources/css/dashboard/users/index.css',
      'resources/css/dashboard/users/create.css',
      'resources/css/dashboard/users/read.css',
      'resources/css/dashboard/library/index.css',
   ], 'public/css/dashboard.css')

   .js([
      'resources/js/layouts/master.js',
      'resources/js/layouts/header.js',
      'resources/js/layouts/footer.js',
      'resources/js/auth/master.js',
      'resources/js/auth/login.js',
      'resources/js/components/books-card.js',
      'resources/js/components/pagination.js',
      'resources/js/pages/index.js',
      'resources/js/pages/about/index.js',
      'resources/js/pages/notifications/index.js',
      'resources/js/pages/notifications/read.js',
      'resources/js/pages/account/activities.js',
      'resources/js/pages/account/booked-books.js',
      'resources/js/pages/account/liked-books.js',
      'resources/js/pages/account/presentation.js',
      'resources/js/pages/account/profile.js',
      'resources/js/pages/account/read-books.js',
      'resources/js/pages/account/readers.js',
      'resources/js/pages/account/sidebar.js',
      'resources/js/pages/activities/index.js',
      'resources/js/pages/activities/read.js',
      'resources/js/pages/books/index.js',
      'resources/js/pages/books/read.js',
      'resources/js/pages/presentations/index.js',
      'resources/js/pages/ratings/active-reader.js',
      'resources/js/pages/ratings/disciplined-reader.js',
      'resources/js/pages/ratings/popular-book.js',
      'resources/js/pages/ratings/proactive-member.js',
      'resources/js/pages/ratings/reading-company.js',
      'resources/js/pages/ratings/sidebar.js',
      'resources/js/pages/rules/index.js',
      'resources/js/pages/users/index.js',
      'resources/js/pages/users/read.js',
   ], 'public/js/app.js')

   .js([
      'resources/js/dashboard/master.js',
      'resources/js/dashboard/sidebar.js',
      'resources/js/dashboard/activities/index.js',
      'resources/js/dashboard/activities/create.js',
      'resources/js/dashboard/activities/read.js',
      'resources/js/dashboard/activities/update.js',
      'resources/js/dashboard/books/index.js',
      'resources/js/dashboard/books/create.js',
      'resources/js/dashboard/books/read.js',
      'resources/js/dashboard/banners/index.js',
      'resources/js/dashboard/banners/create.js',
      'resources/js/dashboard/banners/read.js',
      'resources/js/dashboard/companies/index.js',
      'resources/js/dashboard/presentations/index.js',
      'resources/js/dashboard/presentations/create.js',
      'resources/js/dashboard/presentations/read.js',
      'resources/js/dashboard/users/index.js',
      'resources/js/dashboard/users/create.js',
      'resources/js/dashboard/users/read.js',
      'resources/js/dashboard/library/index.js',
   ], 'public/js/dashboard.js')

   .version();

