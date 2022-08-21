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
        background-color: #151515;
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
        padding-inline: 1.25rem;
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

    .disk {
        display: inline-block;
        width: 10px;
        aspect-ratio: 1/1;
        background-color: whitesmoke;
        margin-right: 3px;
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

    li.project a {
        font-weight: 600;
        font-size: 18px;
    }

    footer {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #2a2a2a;
        color: #eee;
        text-align: center;
        margin-top: 3rem;
        padding: 2rem;
    }

    footer p {
        font-size: 0.9rem;
    }
    code {
        position: relative;
        width: 100%;
        padding: 0.3rem 3rem 0.3rem !important;
        border-radius: 0.25rem;
        background-color: floralwhite !important;
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
            This page is being served by the PHPRouter package. Click <a href="https://github.com/aosasona/php-router-demo" target="_blank" rel="noopener noreferrer">here</a>
            to check out the source code for this website on GitHub.
        </p>


    </section>

    <section>
        <h1>Installation</h1>
        <hr />
        <p>
            To install PHPRouter, run the following command:
        </p>
        <pre>
                <code id="installation">
                    composer require trulyao/php-router
                </code>
        </pre>
        <p>
            After this, you would also need to update your Apache server's .htaccess file to allow this package work properly.
            You can find the recommended .htaccess config <a href="https://github.com/aosasona/php-router#update-htaccess-file" target="_blank" rel="noopener noreferrer">here</a>
        </p>
    </section>

    <section>
        <h1>Create a new project</h1>
        <hr />
        <p>
            You can run the command below to generate a boilerplate project that uses PHP router and contains other bare
            minimum like MySQL & PHPMyAdmin in a dockerized setup.
        </p>
        <pre>
            <code id="get-started">
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
        <h1>Projects</h1>
        <hr />
        <p>Here are some of the projects currently using this package:</p>
        <ul>
            <li class="project">
                <span class="disk"></span>
                <a href="/projects/randgen" target="_blank" rel="noopener noreferrer">
                    RandGen
                </a>
                <p style="color: #aaa">
                        Generate random strings for passwords, encryption keys etc
                    </p>
            </li>
            <li class="project">
                <span class="disk"></span>
                <a href="/projects/php-jwt-api" target="_blank" rel="noopener noreferrer">
                    PHP JWT API
                </a>
                <p style="color: #aaa">A notes API with JSON Web Token authentication</p>
            </li>
        </ul>
    </section>

    <section>
        <h1>Sample Usage</h1>
        <hr />
        <pre style="padding:0 !important">
            <code class="language-php" code="code-sample">

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

<script>
    const copy = async (id) => {
        const el = document.getElementById(id);
        const elementContent = el.innerText;
        await navigator.clipboard.writeText(elementContent);
        alert("Copied to clipboard!");
    }

    const codeBlocks = document.getElementsByTagName("code");
    for (let i = 0; i < codeBlocks.length; i++) {
        codeBlocks[i].addEventListener("click", function() {
            copy(this.id);
        });
        const newEl = document.createElement("p");
        newEl.innerText = "Tap or click to copy";
        newEl.style.color = "#cccccc";
        newEl.style.opacity = "0.5";
        newEl.style.fontSize = "0.6rem";
        newEl.style.marginTop = "0.5rem";

        codeBlocks[i].parentNode.insertBefore(newEl, codeBlocks[i].nextSibling);
    }
</script>

</body>

</html>