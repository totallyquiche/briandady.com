<?php require_once(__DIR__ . '/bootstrap.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta
            name="description"
            content="<?= getUserName($session_key, $github_user_name) ?> -
                contact information, resume, and software development portfolio.">
        <meta
            name="author"
            content="<?= getUserName($session_key, $github_user_name) ?>">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1">

        <title><?= getUserName($session_key, $github_user_name) ?></title>

        <link rel="stylesheet" href="./assets/css/style.css">

        <script src="https://kit.fontawesome.com/f1f2b8f857.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="container">
            <header>
                <img
                    id="profile-image"
                    src="<?= getUserPhotoUrl($session_key, $github_user_name) ?>"
                    alt="<?= getUserName($session_key, $github_user_name) ?> GitHub profile image"
                    height="250"
                    width="250">
                <div id="contact-details-container">
                    <h1>Hello, World!</h1>
                    <span>
                        My name is
                        <b><?= getUserName($session_key, $github_user_name) ?></b>.
                        <?= getUserBio($session_key, $github_user_name) ?>
                    <br/><br/>
                    <span>
                        Email me at
                        <a
                            href="mailto:<?= getUserEmail($session_key, $github_user_name) ?>"
                            title="Send an email to <?= getUserName($session_key, $github_user_name) ?>">
                            <i class="fa-regular fa-envelope"></i><?= getUserEmail($session_key, $github_user_name) ?>
                        </a>
                    </span>
                    <span>
                        See my GitHub at
                        <a
                            href="<?= getUserUrl($session_key, $github_user_name) ?>"
                            title="View the <?= $github_user_name ?> GitHub page">
                            <i class="fa-brands fa-github-alt"></i><?= $github_user_name ?>
                        </a>
                    </span>
                    <span>
                        View my
                        <a href="resume.html">
                            <i class="fa-regular fa-file-lines"></i>resume
                        </a>
                    </span>
                </div>
            </header>
            <hr/>
            <main>
                <h2>Projects</h2>
                <div id="project-card-container">
                    <?php
                        foreach (getUserProjects($session_key, $github_user_name) as $project) {
                            $url = $project['url'] ?? '';
                            $name = $project['name'] ?? '';
                            $language = $project['language'] ?? '';
                            $description = $project['description'] ?? '';

                            echo <<<HTML
    <div class="project-card">
        <h3>
            <a href="$url" title="View this project on GitHub">$name</a>
        </h3>
        <span>$description</span>
    </div>
    HTML;
                        }
                    ?>
                </div>
            </main>
            <footer>
                <!-- -->
            </footer>
        </div>
    </body>
</html>