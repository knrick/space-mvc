<?php use App\Library\Framework\Component\Code; ?>

<article>

    <h3>Server Requirements</h3>

    <p>The Space MVC framework has a few system requirements:</p>

    <div class="content-list">
        <ul>
            <li>PHP &gt;= 7.0.0</li>
            <li>PDO PHP Extension</li>
            <li>PHP Memcached</li>
            <li>Mysql Database</li>
        </ul>
    </div>

    <h3>Installing Framework</h3>

    <p>You can install Space CRM quite easily using github and composer.</p>

    <?php echo Code::getHtmlStatic('git clone https://github.com/space-mvc/space-mvc.git'); ?>
	<?php echo Code::getHtmlStatic('composer install'); ?>

    <h2>Web Server Configuration</h2>

    <h4>Apache</h4>
    <p>
        Space MVC includes a public/.htaccess file that is used to provide URLs without the index.php front
        controller in the path. Before serving Space MVC with Apache, be sure to enable the mod_rewrite module
        so the .htaccess file will be honored by the server.
    </p>

    <p>If the .htaccess file that ships with
        Space MVC does not work with your Apache installation, try this alternative:
    </p>

	<?php echo Code::getHtmlStatic('Options +FollowSymLinks -Indexes
    RewriteEngine On
    
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
    
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]'); ?>

    <h4>Nginx</h4>
    <p>
        If you are using Nginx, the following directive in your site configuration will direct all requests
        to the index.php front controller:
    </p>

    <?php echo Code::getHtmlStatic('location / {
    try_files $uri $uri/ /index.php?$query_string;
}'); ?>
</article>
