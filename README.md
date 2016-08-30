# WPG HTTPS Proxy

Catch and redirect HTTPS request through a proxy, solving the SSL/TLS errors on your server

## Installation (WordPress)

Install the https-proxy server:

1. Copy the `server` directory on your server (you can name it as you want)
2. Go in the directory, and run `composer install`

Install the WordPress mu-plugin:

1. Add the file `wpg-http-proxy.php` in your `wp-content/mu-plugins` directory
2. Add `define('WPG_HTTPS_PROXY_URL', '<your-server-url>')` to your `wp-config.php`.
3. Replace `<your-server-url>` with the url of your http-server installation
