<?php

use Github\Client;

function loadConfig(): void
{
    Dotenv\Dotenv::create(__DIR__ . '/../')->load();
}

function getGitHubClient(string $access_token): Client
{
    $github_client = new Client;

    try {
        $github_client->authenticate(
            $access_token,
            null,
            Github\AuthMethod::ACCESS_TOKEN
        );
    } catch (Exception $exception) {
        handleApiFailure();
    }

    return $github_client;
}

function handleApiFailure(): void
{
    http_response_code(500);
    header('location: ' . getenv('WEBSITE_FALLBACK_URL'));
}

function filterProjects(array $projects): array
{
    return array_filter(
        $projects,
        fn ($project) => !$project['fork']
    );
}

function sortProjects(array $projects): array
{
    usort(
        $projects,
        fn ($a, $b) => $b['pushed_at'] <=> $a['pushed_at']
    );

    return $projects;
}

function getUserDataFromApi(Client $github_client, string $github_user_name): array
{
    $github_user_information = $github_client->api('current_user')->show();

    return array(
        'user_information' => $github_user_information,
        'bio_text' => $github_user_information['bio'],
        'projects' => $github_client->api('user')->repositories($github_user_name),
    );
}

function updateUserDataCache(string $session_key, Client $github_client, string $github_user_name): void
{
    $_SESSION[$session_key] = getUserDataFromApi(
        $github_client,
        $github_user_name
    );
}

function getUserDataFromCache(string $session_key): array
{
    return $_SESSION[$session_key];
}

function getUserData(string $session_key, string $github_user_name): array
{
    if (!isset($_SESSION[$session_key])) {
        updateUserDataCache(
            $session_key,
            getGitHubClient(
                getenv('GITHUB_PERSONAL_ACCESS_TOKEN')
            ),
            $github_user_name
        );
    }

    return getUserDataFromCache($session_key);
}

function getUserName(string $session_key, string $github_user_name): string
{
    return getUserData($session_key, $github_user_name)['user_information']['name'];
}

function getUserPhotoUrl(string $session_key, string $github_user_name): string
{
    return getUserData($session_key, $github_user_name)['user_information']['avatar_url'];
}

function getUserBio(string $session_key, string $github_user_name): string
{
    return getUserData($session_key, $github_user_name)['user_information']['bio'];
}

function getUserEmail(string $session_key, string $github_user_name): string
{
    return getUserData($session_key, $github_user_name)['user_information']['email'];
}

function getUserHtmlUrl(string $session_key, string $github_user_name): string
{
    return getUserData($session_key, $github_user_name)['user_information']['html_url'];
}

function getUserProjects(string $session_key, string $github_user_name): array
{
    $projects = getUserData($session_key, $github_user_name)['projects'];

    usort($projects, function($a, $b) {
        return (new DateTime($b['updated_at'])) < (new DateTime($a['updated_at']))
            ? -1
            : 1;
    });

    return $projects;
}