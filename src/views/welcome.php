<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/public/code.jpg" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/public/code.jpg" type="image/x-icon" />
    <title>PHPRouter</title>
</head>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/default.min.css">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html,
    body {
        max-width: 100vw !important;
        font-family: sans-serif;
    }

    body {
        background-color: #000615;
        color: #fff;
    }

    main {
        max-width: 768px;
        margin: 0 auto;
    }

    header {
        width: 100%;
        background-color: #39e;
        color: white;
        padding: 1.5rem;
        margin-bottom: 2rem;
        text-align: center;
    }

    a {
        color: #39e;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    section {
        padding-inline: 1.5rem;
        margin-top: 2rem;
    }

    section h1 {
        font-size: 2rem;
        color: #ccc;
    }

    p {
        margin-top: 0.15rem;
        font-size: 0.95rem;
        padding: 0;
        line-height: 1.4;
    }

    h2 {
        font-size: 1.5rem;
        color: #444;
        margin-top: 1rem;
    }

    ul {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        list-style: none;
        padding: 0 0.4rem;
        margin-top: 1rem;
    }

    footer {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        color: #444444;
        text-align: center;
        margin-top: 3rem;
        padding: 2rem;
    }

    footer p {
        font-size: 0.9rem;
    }
    code {
        padding: 0.3rem 0 !important;
        border-radius: 0.25rem;
        background-color: #fff !important;
    }
    code::-webkit-scrollbar {
        display: none;
    }

    pre {
        padding: 0.5rem;
        overflow-x: auto;
    }

    hr {
        border: none;
        border-top: 2px solid #cccccc4f;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    span.method {
        display: inline-block;
        color: #39e;
        font-weight: bold;
        font-size: 0.7rem;
        background-color: white;
        padding: 0.25rem 0.5rem;
        margin-right: 0.75rem;
        border-radius: 0.1rem;
    }
</style>

<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js"></script>
<script>
    hljs.highlightAll();
</script>

<body>
<header>
    <h1 style="font-size: 1.5rem">PHPRouter</h1>
</header>

<main>
    <section>
        <h1>Welcome</h1>
        <hr />
        <p>
            This page is being served by the PHPRouter package. Click <a href="https://github.com/aosasona/php-router">here</a>
            to check it out on GitHub.
        </p>

        <p>
            View documentation here: <a href="https://github.com/aosasona/php-router#php-router">Github</a>
        </p>

    </section>

    <section>
        <h1>Installation</h1>
        <hr />
        <p>
            To install PHPRouter, run the following command:
        </p>
        <pre>
                <code>
                    composer require trulyao/php-router
                </code>
        </pre>
        <p>
            After this, you would also need to update your Apache .htaccess files to allow this package work.
            You can find the recommended .htaccess config <a href="https://github.com/aosasona/php-router#update-htaccess-file">here</a>
        </p>
    </section>

    <section>
        <h1>Create a new project</h1>
        <hr />
        <p>
            You can run the command below to generate a new project that uses PHP router and contains other bare
            minimum like MySQL & PHPMyAdmin in a dockerized setup.
        </p>
        <pre>
            <code>
                composer create-project trulyao/php-starter hello-world
            </code>
        </pre>

    </section>

    <section>
        <h1>Routes</h1>
        <hr />
        <ul>
            <li>
                <span class="method">GET</span><a href="/about">/about</a>
            </li>
            <li>
                <span class="method">GET</span><a href="/handler">/handler - served from controller file</a>
            </li>
            <li>
                <span class="method">GET</span><a href="/John">/:name - dynamic route</a>
            </li>
            <li>
                <span class="method">GET</span><a href="/not-a-path/some_unknown_page">404</a>
            </li>
        </ul>
    </section>

    <section>
        <h1>Sample Usage</h1>
        <hr />
        <pre style="padding:0 !important">
            <code class="language-php">

          use \Trulyao\PhpRouter\Router as Router;

          $router = new Router(__DIR__."/views", "demo");

          $router->get("/", function($req, $res) {
              return $res->send("<h1>Hello World</h1>")
                  ->status(200);
          });

          $router->get('/render', function ($req, $res) {
              return $res->render("second.html", $req);
          });

          $router->post("/", function($req, $res) {
              return $res->send([
                  "message" => "Hello World"
              ]);
          });

          $router->delete("/", [new NoteController(), "destroy"]);

          $router->route("/more/chained")
                ->get(function (Request $req, Response $res) {
                    return $res->send("<b>GET</b> - Chained!");
                })
                ->post(function (Request $req, Response $res) {
                    return $res->send("POST - Chained!");
                });

          # Start the router - very important!
          $router->serve();

            </code>
        </pre>
    </section>
</main>

<footer>
    <p>Built by <a href="https://twitter.com/trulyao" target="_blank" rel="noopener noreferrer">Ayodeji</a>
    <p>
        <a href="https://github.com/aosasona/php-router#readme" target="_blank"
           rel="noopener noreferrer">Documentation</a>
    </p>
</footer>


</body>

</html>