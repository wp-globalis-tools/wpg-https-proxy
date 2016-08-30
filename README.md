# WPG HTTPS Proxy

Catch and redirect HTTPS request through a proxy, solving the SSL/TLS errors on your server

## Installation (WordPress)

Install the https-proxy server:

1. Copy the `server` directory on your server, and run `composer install`

Install the WordPress mu-plugin:

1. Add this `wpg-http-proxy` in your `wp-content/mu-plugins` directory
2. Add `define('WPG_HTTPS_PROXY_URL', '<your-server-url>')` to your `wp-config.php`. Do not forget to replace `<your-server-url>` with the appropriate url where the server is.
