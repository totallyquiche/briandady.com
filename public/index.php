<?php
    // Composer autoloader
    require_once(__DIR__ . '/../vendor/autoload.php');

    // Load environment variables defined in .evn
    \Dotenv\Dotenv::create(__DIR__ . '/../')->load();

    // Instantiate GitHub client
    $github_client = new \Github\Client();

    // Authenticate GitHub client
    $github_client->authenticate(getenv('GITHUB_PERSONAL_ACCESS_TOKEN'), null, \Github\Client::AUTH_HTTP_TOKEN);

    // Get GitHub user information
    $github_user_information = $github_client->api('current_user')->show();

    // Instatiate Converter
    $converter = new \TotallyQuiche\URLtoLink\Converter;

    // Get projects
    $project_repo_names = [
        'second-city-murals-api',
        'php-url-to-link',
        'briandady.com'
    ];

    $projects = [];

    foreach ($project_repo_names as $project_repo_name) {
        try {
            $project = $github_client->api('repo')
                                     ->show('totallyquiche', $project_repo_name);
        } catch (\Github\Exception\RuntimeException $exception) {
            continue;
        }

        $projects[] = $project;
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

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Core CSS -->
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>

    <body>

        <!-- Page container start -->
        <div class="container">

            <!-- About section start -->
            <div class="container">

                <!-- Details row start -->
                <div class="row mt-2">

                    <!-- Avatar column start -->
                    <div class="col-12 col-md-4 mb-2 mt-2 text-center">
                        <img id="about-details-avatar-image" class="rounded-circle img-fluid" src="<?= $github_user_information['avatar_url']; ?>" alt="Photo of Brian Dady">
                    </div>
                    <!-- Avatar column end -->

                    <!-- Info column start -->
                    <div class="col-12 col-md-8">

                        <!-- Greeting row start -->
                        <div class="row mt-2 mt-md-2 mt-md-3 mt-lg-5">

                            <!-- Greeting column start -->
                            <div class="col-12">
                                <h1 class="align-middle">Hello, World!</h1>
                            </div>
                            <!-- Greeting column stop -->

                        </div>
                        <!-- Greeting row stop -->

                        <!-- Bio row start -->
                        <div class="row">

                            <!-- Bio column start -->
                            <div class="col-12">
                                <p>
                                    My name is <b><?= $github_user_information['name']; ?></b>. <?= $converter->convert($github_user_information['bio'], '_BLANK'); ?>
                                </p>
                            </div>
                            <!-- Bio column stop -->

                        </div>
                        <!-- Bio row stop -->

                        <!-- Contact row start -->
                        <div class="row">

                            <!-- Info column start -->
                            <div class="col-12">

                                <!-- Contact methods list start -->
                                <ul class="list-unstyled">

                                    <!-- Email start -->
                                    <li>Email me at
                                        <a href="mailto:<?= $github_user_information['email']; ?>" title="Send an email to <?= $github_user_information['name']; ?>"  target="_BLANK">
                                            <span class="fas fa-fw fa-envelope"></span><?= $github_user_information['email']; ?>
                                        </a>
                                    </li>
                                    <!-- Email end -->

                                    <!-- GitHub start -->
                                    <li>See my GitHub at
                                        <a href="<?= $github_user_information['html_url']; ?>" title="View <?= $github_user_information['login']; ?>'s GitHub page" target="_BLANK">
                                            <span class="fab fa-fw fa-github"></span><?= $github_user_information['login']; ?>
                                        </a>
                                    </li>
                                    <!-- GitHub end -->

                                </ul>
                                <!-- Contact methods list stop -->

                            </div>
                            <!-- Info column end -->

                        </div>
                        <!-- Contact row stop -->

                    </div>
                    <!-- About column end -->

                </div>
                <!-- Details row end -->

            </div>
            <!-- About section end -->

            <hr />

            <!-- Projects section start -->
            <div class="container">

                <!-- Projects header row start -->
                <div class="row mb-2">

                    <!-- Projects header column start -->
                    <div class="col-12">
                        <h1>Projects</h1>
                    </div>
                    <!-- Projects header column stop -->

                </div>
                <!-- Projects header row stop -->

                <!-- Project cards row start -->
                <div class="row">

                    <?php foreach ($projects as $project): ?>

                        <!-- Project card column start -->
                        <div class="col-12 mb-4">

                            <!-- Project card start -->
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title"><?= $project['name']; ?> <span class="badge badge-secondary align-middle"><?= $project['language'] ?></span></h2>
                                    <p class="card-text"><?= $project['description']; ?></p>
                                    <a href="<?= $project['html_url']; ?>" target="_BLANK" class="btn btn-primary">View on GitHub</a>
                                </div>
                            </div>
                            <!-- Project card stop -->

                        </div>
                        <!-- Project card column end -->

                    <?php endforeach; ?>

                </div>
                <!-- Project cards row end -->

            </div>
            <!-- Projects section end -->

            <!-- Footer row start -->
            <div class="row">

                <!-- Copyright column start -->
                <div class="col-12 text-center">
                    <p><span class="fas fa-fw fa-copyright"></span><?= date('Y'); ?> Brian Dady</p>
                </div>
                <!-- Copyright column end -->

            </div>
            <!-- Footer row end -->

        </div>
        <!-- Page container end -->

        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>

    </body>
</html>