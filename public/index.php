<?php
    session_start();

    // Composer autoloader
    require_once(__DIR__ . '/../vendor/autoload.php');

    // Load environment variables defined in .evn
    Dotenv\Dotenv::create(__DIR__ . '/../')->load();

    // Instantiate text-to-link converter
    $link_converter = new \TotallyQuiche\URLtoLink\Converter;

    // Fetch GitHub info from $_SESSION, if it's there, or from the GitHub API
    if (isset($_SESSION['github-info'])) {
        $github_user_information = $_SESSION['github-info']['user_information'];
        $github_bio_text= $_SESSION['github-info']['bio_text'];
        $projects = array_filter(
            $_SESSION['github-info']['projects'],
            fn($project) => !$project['fork']
        );
    } else {
        // Instantiate GitHub API client
        $github_client = new Github\Client;

        try {
            $github_client->authenticate(
                getenv('GITHUB_PERSONAL_ACCESS_TOKEN'),
                null,
                Github\Client::AUTH_ACCESS_TOKEN
            );

            $github_user_information = $github_client->api('current_user')->show();
            $github_bio_text = $link_converter->convert($github_user_information['bio'], '_BLANK');
            $projects = $github_client->api('user')->repositories('totallyquiche');

            usort(
                $projects,
                fn($a, $b) => $b['pushed_at'] <=> $a['pushed_at']
            );

            $_SESSION['github-info'] = array(
                'user_information' => $github_user_information,
                'bio_text' => $github_bio_text,
                'projects' => $projects,
            );
        } catch (Exception $exception) {
            error_log('Exception encountered while connecting to GitHub API: ' . $exception->getMessage());
            http_response_code(500);
            header('location: ' . getenv('WEBSITE_FALLBACK_URL'));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Brian Dady's contact information and web development portfolio.">
        <meta name="author" content="<?= $github_user_information['name'] . ' <' . $github_user_information['email'] . '>'; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $github_user_information['name']; ?></title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="container">
                <div class="row mt-2">
                    <div class="col-12 col-md-4 mb-2 mt-2 text-center">
                        <img id="about-details-avatar-image" class="rounded-circle img-fluid" src="<?= $github_user_information['avatar_url']; ?>" alt="Photo of Brian Dady">
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="row mt-2 mt-md-2 mt-md-3 mt-lg-5">
                            <div class="col-12">
                                <h1 id="greeting" class="align-middle">Hello, World!</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>
                                    My name is <b><?= $github_user_information['name']; ?></b>.
                                    <?= $github_bio_text ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-unstyled">
                                    <li>Email me at
                                        <a href="mailto:<?= $github_user_information['email']; ?>" title="Send an email to <?= $github_user_information['name']; ?>"  target="_BLANK">
                                            <span class="fas fa-fw fa-envelope"></span><?= $github_user_information['email']; ?>
                                        </a>
                                    </li>
                                    <li>See my GitHub at
                                        <a href="<?= $github_user_information['html_url']; ?>" title="View <?= $github_user_information['login']; ?>'s GitHub page" target="_BLANK">
                                            <span class="fab fa-fw fa-github"></span><?= $github_user_information['login']; ?>
                                        </a>
                                    </li>
                                    <li>View my
                                        <a href="resume.html" title="View Brian Dady's resume" target="_BLANK">
                                            <span class="fas fa-fw fa-file-alt"></span>resume
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="container">
                <div class="row mb-2">
                    <div class="col-12">
                        <h1>Projects</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="projects">
                            <?php foreach ($projects as $index => $project): ?>
                                    <div class="card <?= ($index % 2 === 0) ? 'card-even' : 'card-odd' ?>">
                                        <div class="card-body">
                                            <h2 class="card-title">
                                                <a href="<?= $project['html_url']; ?>" target="_BLANK" title="View on GitHub"><?= $project['name']; ?></a>
                                                <span class="badge badge-secondary align-middle">
                                                    <?= $project['language'] ?>
                                                </span>
                                            </h2>
                                            <p class="card-text"><?= $link_converter->convert($project['description'], '_BLANK'); ?></p>
                                            <?php if (isset($project['homepage'])): ?>
                                                <span>
                                                    <a href="<?= $project['homepage']; ?>" target="_BLANK" title=""><?= $project['homepage']; ?></a>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p><span class="fas fa-fw fa-copyright"></span><?= date('Y'); ?> Brian Dady</p>
                </div>
            </div>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
    </body>
</html>