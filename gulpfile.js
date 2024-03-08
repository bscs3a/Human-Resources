var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
require('dotenv').config();

// Array of directories
var directories = ['admin', 'delivery', 'finance', 'humanResources', 'inventory', 'sales'];

// Static server
gulp.task('serve', function() {
    browserSync.init({

        // proxy: 'localhost/' + process.env.PROXY_ADDRESS,

        proxy: 'localhost/master',
        browser: "chrome",
        middleware: function (req, res, next) {
            res.setHeader('Cache-Control', 'no-cache, no-store, must-revalidate');
            next();
        }
    });
    gulp.watch("./**/*.php", { usePolling: true }).on('change', browserSync.reload);
    gulp.watch("./src/tailwind.css", { usePolling: true }).on('change', browserSync.reload);
    gulp.watch("./**/*.css", { usePolling: true }).on('change', browserSync.reload);
    gulp.watch("./**/*.js", { usePolling: true }).on('change', browserSync.reload);
    gulp.watch("./**/*.html", { usePolling: true }).on('change', browserSync.reload);
   
    directories.forEach(dir => {
        gulp.watch(`C:/xampp/htdocs/Master/public/${dir}/**/*.*`, { usePolling: true }).on('change', browserSync.reload);
    });

});


