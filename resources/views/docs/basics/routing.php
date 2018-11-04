<article>
	<p><a name="basic-routing"></a></p>
	<h2><a href="#basic-routing" style="color:#5A5A5A;">Basic Routing</a></h2>
	<p>The most basic Space MVC routes accept a URI and a <code class=" language-php">Closure</code>, providing a very simple and expressive method of defining routes:</p>
	<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token keyword">return</span> <span class="token string">'Hello World'</span><span class="token punctuation">;</span>
    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
	<h4>The Default Route Files</h4>
	<p>All Space MVC routes are defined in your route files, which are located in the <code class=" language-php">routes</code> directory. These files are automatically loaded by the framework. The <code class=" language-php">routes<span class="token operator">/</span>web<span class="token punctuation">.</span>php</code> file defines routes that are for your web interface. These routes are assigned the <code class=" language-php">web</code> middleware group, which provides features like session state and CSRF protection. The routes in <code class=" language-php">routes<span class="token operator">/</span>api<span class="token punctuation">.</span>php</code> are stateless and are assigned the <code class=" language-php">api</code> middleware group.</p>
	<p>For most applications, you will begin by defining routes in your <code class=" language-php">routes<span class="token operator">/</span>web<span class="token punctuation">.</span>php</code> file. The routes defined in <code class=" language-php">routes<span class="token operator">/</span>web<span class="token punctuation">.</span>php</code> may be accessed by entering the defined route's URL in your browser. For example, you may access the following route by navigating to <code class=" language-php">http<span class="token punctuation">:</span><span class="token operator">/</span><span class="token operator">/</span>your<span class="token operator">-</span>app<span class="token punctuation">.</span>test<span class="token operator">/</span>user</code> in your browser:</p>
	<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'/user'</span><span class="token punctuation">,</span> <span class="token string">'UserController@index'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
	<p>Routes defined in the <code class=" language-php">routes<span class="token operator">/</span>api<span class="token punctuation">.</span>php</code> file are nested within a route group by the <code class=" language-php">RouteServiceProvider</code>. Within this group, the <code class=" language-php"><span class="token operator">/</span>api</code> URI prefix is automatically applied so you do not need to manually apply it to every route in the file. You may modify the prefix and other route group options by modifying your <code class=" language-php">RouteServiceProvider</code> class.</p>
</article>