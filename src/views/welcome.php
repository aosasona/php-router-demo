<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        color: #444;
    }

    section p {
        margin-top: 0.75rem;
        font-size: 0.95rem;
        padding: 0 1rem;
    }

    ul {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        list-style: none;
        padding: 0 1rem;
        margin-top: 1rem;
    }

    footer {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #eeeeeea1;
        text-align: center;
        margin-top: 3rem;
        padding: 2rem;
    }

    footer p {
        font-size: 0.9rem;
    }

    pre {
        padding: 0.5rem;
        border-radius: 0.25rem;
        overflow-x: auto;
    }
</style>

<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js"></script>
<script>
    hljs.highlightAll();
</script>

<body>
<header>
    <h1>PHPRouter</h1>
</header>

<main>
    <section>
        <h1>Welcome</h1>
        <p>
            This page is being served by the PHPRouter package. Click <a href="https://github.com/aosasona/php-router">here</a>
            to check it out on GitHub.
        </p>

        <p>
            View documentation here: <a href="https://github.com/aosasona/php-router#php-router">Github</a>
        </p>

        <h2>Installation</h2>
        <p>
            To install PHPRouter, run the following command:
        </p>
        <pre>
                <code class="language-bash">
                    composer require trulyao/php-router
                </code>
        </pre>
        <p>
            After this, you would also need to update your Apache .htaccess files to allow this package work.
            You can find the recommended .htaccess config <a href="https://github.com/aosasona/php-router#update-htaccess-file">here</a>
        </p>

        <h2>Create a new project</h2>
        <p>
            You can run the command below to generate a new project that uses PHP router and contains other bare
            minimum like MySQL & PHPMyAdmin in a dockerized setup.
        </p>
        <pre>
            <code class="language-bash">
                composer create-project trulyao/php-starter hello-world
            </code>
        </pre>

    </section>

    <section>
        <h1>Routes</h1>
        <ul>
            <li>
                <a href="/about">/about</a>
            </li>
            <li>
                <a href="/handler">/handler - served from controller file</a>
            </li>
            <li>
                <a href="/John">/:name - dynamic route</a>
            </li>

            <li>
                <a href="/not-a-path/some_unknown_page">404</a>
            </li>
        </ul>
    </section>

    <section>
        <h1>Sample Usage</h1>
        <pre>
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

          # using a class based controller
          $router->delete("/", [new NoteController(), "destroy"]);

          $router->route("/chained")
              ->get(function ($req, $res) {
                  return $res->send("GET - Chained!");
              })
              ->post(function ($req, $res) {
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