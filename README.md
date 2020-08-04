# The Complete Guide to Building Premium WordPress Themes

Source code for my course: [The Complete Guide to Building Premium WordPress Themes](https://www.udemy.com/course/the-complete-guide-to-building-premium-wordpress-themes/?referralCode=A1E38F238B8F5A8D2B82)

-  Download or clone the repository in the WordPress themes directory.
-  Activate the theme from wp-admin.
-  Open the CMD/Terminal and change to the theme's directory (/wp-content/themes/firstheme)
-  Run `npm install`
-  Go to gulpfile.babel.js and find this code:
    ```
    export const serve = done => {
    server.init({
        proxy: "http://localhost:8888/myfirsttheme"
    });
    done();
    };
    ```
    And change the proxy URL to the URL of your WordPress installation on your machine. The port will vary depending on the software you are using (WAMP,MAMP,XAMPP, etc..)
-  Run `npm run start`, this will open a browsersync url where your browser will refresh every time you change some code in your theme.
-  `npm run start` is useful for development. For production you can run `npm run build` to generate minified assets for production. (You can see generated assets in the dist folder)


