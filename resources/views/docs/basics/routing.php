<article>
    <h1>Routing</h1>
    <p><a name="basic-routing"></a></p>
    <h2><a href="#basic-routing">Basic Routing</a></h2>
    <p>The most basic Laravel routes accept a URI and a <code class=" language-php">Closure</code>, providing a very
        simple and expressive method of defining routes:</p>
    <pre>
<code data-language="php">&#x3C;?php
    return [

        // introduction
        [
            'uri' => '/docs/introduction/what-is-space',
            'controller' => 'Docs\IntroductionController',
            'action' => 'whatIsSpace',
        ],

        // getting started
        [
            'uri' => '/docs/getting-started/installation',
            'controller' => 'Docs\IndexController',
            'action' => 'installation',
        ],
</code>
        </pre>


    <pre>
<code data-language="php">Route::get('foo', function () {
    return 'Hello World';
});</code></pre>

    <h4>The Default Route Files</h4>
    <p>
        All Laravel routes are defined in your route files, which are located in the routes directory. These files are
        automatically loaded by the framework. The  routes/web.php file defines routes that are for your web interface.
        These routes are assigned the web middleware group, which provides features like session state and CSRF protection.
        The routes in routes/api.php are stateless and are assigned the api middleware group.

        For most applications, you will begin by defining routes in your routes/web.php file. The routes defined in
        routes/web.php may be accessed by entering the defined route's URL in your browser. For example, you may access
        the following route by navigating to http://your-app.test/user in your browser:
    </p>

    <pre>
        <code data-language="php">Route::get('/user', 'UserController@index');</code>
    </pre>


    <p>
        Routes defined in the routes/api.php file are nested within a route group by the  RouteServiceProvider.
        Within this group, the /api URI prefix is automatically applied so you do not need to manually apply it to
        every route in the file. You may modify the prefix and other route group options by modifying your
        RouteServiceProvider class.
    </p>
    <h4>Available Router Methods</h4>
    <p>The router allows you to register routes that respond to any HTTP verb:</p>


    <pre>
        <code data-language="php">Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);</code></pre>


    <p>Sometimes you may need to register a route that responds to multiple HTTP verbs. You may do so using the <code class=" language-php">match</code> method. Or, you may even register a route that responds to all HTTP verbs using the <code class=" language-php">any</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">match<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'get'</span><span class="token punctuation">,</span> <span class="token string">'post'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'/'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">any<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>CSRF Protection</h4>
    <p>Any HTML forms pointing to <code class=" language-php"><span class="token constant">POST</span></code>, <code class=" language-php"><span class="token constant">PUT</span></code>, or <code class=" language-php"><span class="token constant">DELETE</span></code> routes that are defined in the <code class=" language-php">web</code> routes file should include a CSRF token field. Otherwise, the request will be rejected. You can read more about CSRF protection in the <a href="/docs/5.7/csrf">CSRF documentation</a>:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>form</span> <span class="token attr-name">method</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>POST<span class="token punctuation">"</span></span> <span class="token attr-name">action</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>/profile<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span></span>
    @csrf
    <span class="token punctuation">.</span><span class="token punctuation">.</span><span class="token punctuation">.</span>
<span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>form</span><span class="token punctuation">&gt;</span></span></span></code></pre>
    <p><a name="redirect-routes"></a></p>
    <h3>Redirect Routes</h3>
    <p>If you are defining a route that redirects to another URI, you may use the <code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span>redirect</code> method. This method provides a convenient shortcut so that you do not have to define a full route or controller for performing a simple redirect:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">redirect<span class="token punctuation">(</span></span><span class="token string">'/here'</span><span class="token punctuation">,</span> <span class="token string">'/there'</span><span class="token punctuation">,</span> <span class="token number">301</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="view-routes"></a></p>
    <h3>View Routes</h3>
    <p>If your route only needs to return a view, you may use the <code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span>view</code> method. Like the <code class=" language-php">redirect</code> method, this method provides a simple shortcut so that you do not have to define a full route or controller. The <code class=" language-php">view</code> method accepts a URI as its first argument and a view name as its second argument. In addition, you may provide an array of data to pass to the view as an optional third argument:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">view<span class="token punctuation">(</span></span><span class="token string">'/welcome'</span><span class="token punctuation">,</span> <span class="token string">'welcome'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">view<span class="token punctuation">(</span></span><span class="token string">'/welcome'</span><span class="token punctuation">,</span> <span class="token string">'welcome'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Taylor'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="route-parameters"></a></p>
    <h2><a href="#route-parameters">Route Parameters</a></h2>
    <p><a name="required-parameters"></a></p>
    <h3>Required Parameters</h3>
    <p>Of course, sometimes you will need to capture segments of the URI within your route. For example, you may need to capture a user's ID from the URL. You may do so by defining route parameters:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{id}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token variable">$id</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token keyword">return</span> <span class="token string">'User '</span><span class="token punctuation">.</span><span class="token variable">$id</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may define as many route parameters as required by your route:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'posts/{post}/comments/{comment}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token variable">$postId</span><span class="token punctuation">,</span> <span class="token variable">$commentId</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Route parameters are always encased within <code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">}</span></code> braces and should consist of alphabetic characters, and may not contain a <code class=" language-php"><span class="token operator">-</span></code> character. Instead of using the <code class=" language-php"><span class="token operator">-</span></code> character, use an underscore (<code class=" language-php">_</code>). Route parameters are injected into route callbacks / controllers based on their order - the names of the callback / controller arguments do not matter.</p>
    <p><a name="parameters-optional-parameters"></a></p>
    <h3>Optional Parameters</h3>
    <p>Occasionally you may need to specify a route parameter, but make the presence of that route parameter optional. You may do so by placing a <code class=" language-php"><span class="token operator">?</span></code> mark after the parameter name. Make sure to give the route's corresponding variable a default value:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{name?}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token variable">$name</span> <span class="token operator">=</span> <span class="token keyword">null</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token keyword">return</span> <span class="token variable">$name</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{name?}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token variable">$name</span> <span class="token operator">=</span> <span class="token string">'John'</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token keyword">return</span> <span class="token variable">$name</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="parameters-regular-expression-constraints"></a></p>
    <h3>Regular Expression Constraints</h3>
    <p>You may constrain the format of your route parameters using the <code class=" language-php">where</code> method on a route instance. The <code class=" language-php">where</code> method accepts the name of the parameter and a regular expression defining how the parameter should be constrained:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{name}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token variable">$name</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token string">'[A-Za-z]+'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{id}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token variable">$id</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">,</span> <span class="token string">'[0-9]+'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{id}/{name}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token variable">$id</span><span class="token punctuation">,</span> <span class="token variable">$name</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'id'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'[0-9]+'</span><span class="token punctuation">,</span> <span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'[a-z]+'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="parameters-global-constraints"></a></p>
    <h4>Global Constraints</h4>
    <p>If you would like a route parameter to always be constrained by a given regular expression, you may use the <code class=" language-php">pattern</code> method. You should define these patterns in the <code class=" language-php">boot</code> method of your <code class=" language-php">RouteServiceProvider</code>:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * Define your route model bindings, pattern filters, etc.
 *
 * @return void
 */</span>
<span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">boot<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
<span class="token punctuation">{</span>
    <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">pattern<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">,</span> <span class="token string">'[0-9]+'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

    <span class="token scope"><span class="token keyword">parent</span><span class="token punctuation">::</span></span><span class="token function">boot<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span></code></pre>
    <p>Once the pattern has been defined, it is automatically applied to all routes using that parameter name:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{id}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token variable">$id</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // Only executed if {id} is numeric...
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="named-routes"></a></p>
    <h2><a href="#named-routes">Named Routes</a></h2>
    <p>Named routes allow the convenient generation of URLs or redirects for specific routes. You may specify a name for a route by chaining the <code class=" language-php">name</code> method onto the route definition:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/profile'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">name<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may also specify route names for controller actions:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/profile'</span><span class="token punctuation">,</span> <span class="token string">'UserProfileController@show'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">name<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Generating URLs To Named Routes</h4>
    <p>Once you have assigned a name to a given route, you may use the route's name when generating URLs or redirects via the global <code class=" language-php">route</code> function:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">// Generating URLs...
</span><span class="token variable">$url</span> <span class="token operator">=</span> <span class="token function">route<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// Generating Redirects...
</span><span class="token keyword">return</span> <span class="token function">redirect<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">route<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>If the named route defines parameters, you may pass the parameters as the second argument to the <code class=" language-php">route</code> function. The given parameters will automatically be inserted into the URL in their correct positions:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{id}/profile'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token variable">$id</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">name<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token variable">$url</span> <span class="token operator">=</span> <span class="token function">route<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'id'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token number">1</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Inspecting The Current Route</h4>
    <p>If you would like to determine if the current request was routed to a given named route, you may use the <code class=" language-php">named</code> method on a Route instance. For example, you may check the current route name from a route middleware:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @return mixed
 */</span>
<span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token punctuation">,</span> Closure <span class="token variable">$next</span><span class="token punctuation">)</span>
<span class="token punctuation">{</span>
    <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$request</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">route<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">named<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">)</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

    <span class="token keyword">return</span> <span class="token variable">$next</span><span class="token punctuation">(</span><span class="token variable">$request</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span></code></pre>
    <p><a name="route-groups"></a></p>
    <h2><a href="#route-groups">Route Groups</a></h2>
    <p>Route groups allow you to share route attributes, such as middleware or namespaces, across a large number of routes without needing to define those attributes on each individual route. Shared attributes are specified in an array format as the first parameter to the <code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span>group</code> method.</p>
    <p><a name="route-group-middleware"></a></p>
    <h3>Middleware</h3>
    <p>To assign middleware to all routes within a group, you may use the <code class=" language-php">middleware</code> method before defining the group. Middleware are executed in the order they are listed in the array:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">middleware<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'first'</span><span class="token punctuation">,</span> <span class="token string">'second'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">group<span class="token punctuation">(</span></span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'/'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Uses first &amp; second Middleware
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

    <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/profile'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Uses first &amp; second Middleware
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="route-group-namespaces"></a></p>
    <h3>Namespaces</h3>
    <p>Another common use-case for route groups is assigning the same PHP namespace to a group of controllers using the <code class=" language-php"><span class="token keyword">namespace</span></code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token keyword">namespace</span><span class="token punctuation">(</span><span class="token string">'Admin'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">group<span class="token punctuation">(</span></span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // Controllers Within The "App\Http\Controllers\Admin" Namespace
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Remember, by default, the <code class=" language-php">RouteServiceProvider</code> includes your route files within a namespace group, allowing you to register controller routes without specifying the full <code class=" language-php">App\<span class="token package">Http<span class="token punctuation">\</span>Controllers</span></code> namespace prefix. So, you only need to specify the portion of the namespace that comes after the base <code class=" language-php">App\<span class="token package">Http<span class="token punctuation">\</span>Controllers</span></code> namespace.</p>
    <p><a name="route-group-sub-domain-routing"></a></p>
    <h3>Sub-Domain Routing</h3>
    <p>Route groups may also be used to handle sub-domain routing. Sub-domains may be assigned route parameters just like route URIs, allowing you to capture a portion of the sub-domain for usage in your route or controller. The sub-domain may be specified by calling the <code class=" language-php">domain</code> method before defining the group:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">domain<span class="token punctuation">(</span></span><span class="token string">'{account}.myapp.com'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">group<span class="token punctuation">(</span></span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{id}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token variable">$account</span><span class="token punctuation">,</span> <span class="token variable">$id</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="route-group-prefixes"></a></p>
    <h3>Route Prefixes</h3>
    <p>The <code class=" language-php">prefix</code> method may be used to prefix each route in the group with a given URI. For example, you may want to prefix all route URIs within the group with <code class=" language-php">admin</code>:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">prefix<span class="token punctuation">(</span></span><span class="token string">'admin'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">group<span class="token punctuation">(</span></span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Matches The "/admin/users" URL
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="route-group-name-prefixes"></a></p>
    <h3>Route Name Prefixes</h3>
    <p>The <code class=" language-php">name</code> method may be used to prefix each route name in the group with a given string. For example, you may want to prefix all of the grouped route's names with <code class=" language-php">admin</code>. The given string is prefixed to the route name exactly as it is specified, so we will be sure to provide the trailing <code class=" language-php"><span class="token punctuation">.</span></code> character in the prefix:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">name<span class="token punctuation">(</span></span><span class="token string">'admin.'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">group<span class="token punctuation">(</span></span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Route assigned name "admin.users"...
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">name<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="route-model-binding"></a></p>
    <h2><a href="#route-model-binding">Route Model Binding</a></h2>
    <p>When injecting a model ID to a route or controller action, you will often query to retrieve the model that corresponds to that ID. Laravel route model binding provides a convenient way to automatically inject the model instances directly into your routes. For example, instead of injecting a user's ID, you can inject the entire <code class=" language-php">User</code> model instance that matches the given ID.</p>
    <p><a name="implicit-binding"></a></p>
    <h3>Implicit Binding</h3>
    <p>Laravel automatically resolves Eloquent models defined in routes or controller actions whose type-hinted variable names match a route segment name. For example:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'api/users/{user}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span>App\<span class="token package">User</span> <span class="token variable">$user</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token keyword">return</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">email</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Since the <code class=" language-php"><span class="token variable">$user</span></code> variable is type-hinted as the <code class=" language-php">App\<span class="token package">User</span></code> Eloquent model and the variable name matches the <code class=" language-php"><span class="token punctuation">{</span>user<span class="token punctuation">}</span></code> URI segment, Laravel will automatically inject the model instance that has an ID matching the corresponding value from the request URI. If a matching model instance is not found in the database, a 404 HTTP response will automatically be generated.</p>
    <h4>Customizing The Key Name</h4>
    <p>If you would like model binding to use a database column other than <code class=" language-php">id</code> when retrieving a given model class, you may override the <code class=" language-php">getRouteKeyName</code> method on the Eloquent model:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * Get the route key for the model.
 *
 * @return string
 */</span>
<span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">getRouteKeyName<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
<span class="token punctuation">{</span>
    <span class="token keyword">return</span> <span class="token string">'slug'</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span></code></pre>
    <p><a name="explicit-binding"></a></p>
    <h3>Explicit Binding</h3>
    <p>To register an explicit binding, use the router's <code class=" language-php">model</code> method to specify the class for a given parameter. You should define your explicit model bindings in the <code class=" language-php">boot</code> method of the <code class=" language-php">RouteServiceProvider</code> class:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">boot<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
<span class="token punctuation">{</span>
    <span class="token scope"><span class="token keyword">parent</span><span class="token punctuation">::</span></span><span class="token function">boot<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

    <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">model<span class="token punctuation">(</span></span><span class="token string">'user'</span><span class="token punctuation">,</span> <span class="token scope">App<span class="token punctuation">\</span>User<span class="token punctuation">::</span></span><span class="token keyword">class</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span></code></pre>
    <p>Next, define a route that contains a <code class=" language-php"><span class="token punctuation">{</span>user<span class="token punctuation">}</span></code> parameter:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'profile/{user}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span>App\<span class="token package">User</span> <span class="token variable">$user</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Since we have bound all <code class=" language-php"><span class="token punctuation">{</span>user<span class="token punctuation">}</span></code> parameters to the <code class=" language-php">App\<span class="token package">User</span></code> model, a <code class=" language-php">User</code> instance will be injected into the route. So, for example, a request to <code class=" language-php">profile<span class="token operator">/</span><span class="token number">1</span></code> will inject the <code class=" language-php">User</code> instance from the database which has an ID of <code class=" language-php"><span class="token number">1</span></code>.</p>
    <p>If a matching model instance is not found in the database, a 404 HTTP response will be automatically generated.</p>
    <h4>Customizing The Resolution Logic</h4>
    <p>If you wish to use your own resolution logic, you may use the <code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span>bind</code> method. The <code class=" language-php">Closure</code> you pass to the <code class=" language-php">bind</code> method will receive the value of the URI segment and should return the instance of the class that should be injected into the route:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">boot<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
<span class="token punctuation">{</span>
    <span class="token scope"><span class="token keyword">parent</span><span class="token punctuation">::</span></span><span class="token function">boot<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

    <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">bind<span class="token punctuation">(</span></span><span class="token string">'user'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token variable">$value</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token scope">App<span class="token punctuation">\</span>User<span class="token punctuation">::</span></span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token variable">$value</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">first<span class="token punctuation">(</span></span><span class="token punctuation">)</span> <span class="token operator">?</span><span class="token operator">?</span> <span class="token function">abort<span class="token punctuation">(</span></span><span class="token number">404</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span></code></pre>
    <p><a name="fallback-routes"></a></p>
    <h2><a href="#fallback-routes">Fallback Routes</a></h2>
    <p>Using the <code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span>fallback</code> method, you may define a route that will be executed when no other route matches the incoming request. Typically, unhandled requests will automatically render a "404" page via your application's exception handler. However, since you may define the <code class=" language-php">fallback</code> route within your <code class=" language-php">routes<span class="token operator">/</span>web<span class="token punctuation">.</span>php</code> file, all middleware in the <code class=" language-php">web</code> middleware group will apply to the route. Of course, you are free to add additional middleware to this route as needed:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">fallback<span class="token punctuation">(</span></span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="rate-limiting"></a></p>
    <h2><a href="#rate-limiting">Rate Limiting</a></h2>
    <p>Laravel includes a <a href="/docs/5.7/middleware">middleware</a> to rate limit access to routes within your application. To get started, assign the <code class=" language-php">throttle</code> middleware to a route or a group of routes. The <code class=" language-php">throttle</code> middleware accepts two parameters that determine the maximum number of requests that can be made in a given number of minutes. For example, let's specify that an authenticated user may access the following group of routes 60 times per minute:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">middleware<span class="token punctuation">(</span></span><span class="token string">'auth:api'</span><span class="token punctuation">,</span> <span class="token string">'throttle:60,1'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">group<span class="token punctuation">(</span></span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'/user'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Dynamic Rate Limiting</h4>
    <p>You may specify a dynamic request maximum based on an attribute of the authenticated <code class=" language-php">User</code> model. For example, if your <code class=" language-php">User</code> model contains a <code class=" language-php">rate_limit</code> attribute, you may pass the name of the attribute to the <code class=" language-php">throttle</code> middleware so that it is used to calculate the maximum request count:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">middleware<span class="token punctuation">(</span></span><span class="token string">'auth:api'</span><span class="token punctuation">,</span> <span class="token string">'throttle:rate_limit,1'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">group<span class="token punctuation">(</span></span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'/user'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="form-method-spoofing"></a></p>
    <h2><a href="#form-method-spoofing">Form Method Spoofing</a></h2>
    <p>HTML forms do not support <code class=" language-php"><span class="token constant">PUT</span></code>, <code class=" language-php"><span class="token constant">PATCH</span></code> or <code class=" language-php"><span class="token constant">DELETE</span></code> actions. So, when defining <code class=" language-php"><span class="token constant">PUT</span></code>, <code class=" language-php"><span class="token constant">PATCH</span></code> or <code class=" language-php"><span class="token constant">DELETE</span></code> routes that are called from an HTML form, you will need to add a hidden <code class=" language-php">_method</code> field to the form. The value sent with the <code class=" language-php">_method</code> field will be used as the HTTP request method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>form</span> <span class="token attr-name">action</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>/foo/bar<span class="token punctuation">"</span></span> <span class="token attr-name">method</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>POST<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span></span>
    <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>input</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>hidden<span class="token punctuation">"</span></span> <span class="token attr-name">name</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>_method<span class="token punctuation">"</span></span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>PUT<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span></span>
    <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>input</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>hidden<span class="token punctuation">"</span></span> <span class="token attr-name">name</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>_token<span class="token punctuation">"</span></span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>{{ csrf_token() }}<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span></span>
<span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>form</span><span class="token punctuation">&gt;</span></span></span></code></pre>
    <p>You may use the <code class=" language-php">@method</code> Blade directive to generate the <code class=" language-php">_method</code> input:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>form</span> <span class="token attr-name">action</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>/foo/bar<span class="token punctuation">"</span></span> <span class="token attr-name">method</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>POST<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span></span>
    @<span class="token function">method<span class="token punctuation">(</span></span><span class="token string">'PUT'</span><span class="token punctuation">)</span>
    @csrf
<span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>form</span><span class="token punctuation">&gt;</span></span></span></code></pre>
    <p><a name="accessing-the-current-route"></a></p>
    <h2><a href="#accessing-the-current-route">Accessing The Current Route</a></h2>
    <p>You may use the <code class=" language-php">current</code>, <code class=" language-php">currentRouteName</code>, and <code class=" language-php">currentRouteAction</code> methods on the <code class=" language-php">Route</code> facade to access information about the route handling the incoming request:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$route</span> <span class="token operator">=</span> <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">current<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token variable">$name</span> <span class="token operator">=</span> <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">currentRouteName<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token variable">$action</span> <span class="token operator">=</span> <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">currentRouteAction<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Refer to the API documentation for both the <a href="https://laravel.com/api/5.7/Illuminate/Routing/Router.html">underlying class of the Route facade</a> and <a href="https://laravel.com/api/5.7/Illuminate/Routing/Route.html">Route instance</a> to review all accessible methods.</p>
</article>


