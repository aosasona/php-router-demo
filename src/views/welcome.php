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
        color: #555;
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
        padding: 1rem;
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
                This page is being served by the PHPRouter package. Click <a href="https://github.com/aosasona/php-router">here</a> to check it out on GitHub.
            </p>

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
            </ul>
        </section>

        <section>
            <h1>Sample Usage</h1>
            <pre>
            <code class="language-php">

            require('vendor/autoload.php');

            use Trulyao\PhpRouter;

            $router = new PhpRouter\Router(__DIR__ . "/src", "");

            $router->get("", function ($req, $res) {
                return $res->use("views/welcome.php");
            });

            $router->get("/about", function ($req, $res) {
                return $res->use("views/about.php");
            });


            $router->get("/handler", function ($req, $res) {
                include("src/controllers/post.php");
                return hello($req, $res);
            });

            $router->get(":name", function ($req, $res) {
                return $res->send("Hello {$req->params("name")}")->status(200);
            });


            $router->serve();

            </code>
        </pre>
        </section>
    </main>

    <footer>
        <p>Built by <a href="https://twitter.com/trulyao" target="_blank" rel="noopener noreferrer">Ayodeji</a>
        <p>
            <a href="https://github.com/aosasona/php-router#readme" target="_blank" rel="noopener noreferrer">Documentation</a>
        </p>
    </footer>


</body>

</html>