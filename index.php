<!doctype html>
<html>
    <head>
        <?php include('head.php') ?>
        <title>Dashboard</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Feedback Submission</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
        </ul>
    </div>
    </nav>
    <div class="jumbotron col-sm-12">
        <h1 class="display-4 text-center">Welcome </h1>
    </div>

    <section class="container text-center">
        <form method="post">
            <button type="submit" value="submit" class="btn btn-success" id="feed" name="feedback" formaction="feedback.php">Feedback</button>
        </form>
    </section>
    </body>
</html>