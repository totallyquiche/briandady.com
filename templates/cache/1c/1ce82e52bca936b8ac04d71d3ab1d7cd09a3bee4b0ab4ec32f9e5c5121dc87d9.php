<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* index.html.twig */
class __TwigTemplate_97777780bb12bfbb768f0f774a826f755173199c82bf17eeeff0b672ff409d04 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"description\" content=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["github_user_name"] ?? null), "html", null, true);
        echo " contact information and web development portfolio.\">
        <meta name=\"author\" content=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["github_user_name"] ?? null), "html", null, true);
        echo " <";
        echo twig_escape_filter($this->env, ($context["github_user_email"] ?? null), "html", null, true);
        echo ">\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

        <title>";
        // line 9
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>

        <!-- Bootstrap CSS -->
        <link
            rel=\"stylesheet\"
            href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\"
            integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\"
            crossorigin=\"anonymous\">

        <!-- Core CSS -->
        <link rel=\"stylesheet\" href=\"./assets/css/style.css\">
    </head>

    <body>

        <!-- Page container start -->
        <div class=\"container\">

            <!-- About section start -->
            <div class=\"container\">

                <!-- Details row start -->
                <div class=\"row mt-2\">

                    <!-- Avatar column start -->
                    <div class=\"col-12 col-md-4 mb-2 mt-2 text-center\">
                        <img
                            id=\"about-details-avatar-image\"
                            class=\"rounded-circle img-fluid\"
                            src=\"";
        // line 38
        echo twig_escape_filter($this->env, ($context["github_avatar_url"] ?? null), "html", null, true);
        echo "\"
                            alt=\"";
        // line 39
        echo twig_escape_filter($this->env, ($context["github_user_name"] ?? null), "html", null, true);
        echo " GitHub profile photo\">
                    </div>
                    <!-- Avatar column end -->

                    <!-- Info column start -->
                    <div class=\"col-12 col-md-8\">

                        <!-- Greeting row start -->
                        <div class=\"row mt-2 mt-md-2 mt-md-3 mt-lg-5\">

                            <!-- Greeting column start -->
                            <div class=\"col-12\">
                                <h1 class=\"align-middle\">Hello, World!</h1>
                            </div>
                            <!-- Greeting column stop -->

                        </div>
                        <!-- Greeting row stop -->

                        <!-- Bio row start -->
                        <div class=\"row\">

                            <!-- Bio column start -->
                            <div class=\"col-12\">
                                <p>
                                    My name is <b>";
        // line 64
        echo twig_escape_filter($this->env, ($context["github_user_name"] ?? null), "html", null, true);
        echo "</b>.  ";
        echo ($context["github_bio"] ?? null);
        echo "
                                </p>
                            </div>
                            <!-- Bio column stop -->

                        </div>
                        <!-- Bio row stop -->

                        <!-- Contact row start -->
                        <div class=\"row\">

                            <!-- Info column start -->
                            <div class=\"col-12\">

                                <!-- Contact methods list start -->
                                <ul class=\"list-unstyled\">

                                    <!-- Email start -->
                                    <li>Email me at
                                        <a href=\"mailto:";
        // line 83
        echo twig_escape_filter($this->env, ($context["github_user_email"] ?? null), "html", null, true);
        echo "\" title=\"Send me an email\"  target=\"_BLANK\">
                                            <span class=\"fas fa-fw fa-envelope\"></span>";
        // line 84
        echo twig_escape_filter($this->env, ($context["github_user_email"] ?? null), "html", null, true);
        echo "
                                        </a>
                                    </li>
                                    <!-- Email end -->

                                    <!-- GitHub start -->
                                    <li>See my GitHub at
                                        <a href=\"";
        // line 91
        echo twig_escape_filter($this->env, ($context["github_user_url"] ?? null), "html", null, true);
        echo "\" title=\"View my GitHub page\" target=\"_BLANK\">
                                            <span class=\"fab fa-fw fa-github\"></span>";
        // line 92
        echo twig_escape_filter($this->env, ($context["github_user"] ?? null), "html", null, true);
        echo "
                                        </a>
                                    </li>
                                    <!-- GitHub end -->

                                    <!-- Resume start -->
                                    <li>View my
                                        <a href=\"resume.html\" title=\"View my resume\" target=\"_BLANK\">
                                            <span class=\"fas fa-fw fa-file-alt\"></span>resume
                                        </a>
                                    </li>
                                    <!-- Resume end -->


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
            <div class=\"container\">

                <!-- Projects header row start -->
                <div class=\"row mb-2\">

                    <!-- Projects header column start -->
                    <div class=\"col-12\">
                        <h1>Projects</h1>
                    </div>
                    <!-- Projects header column stop -->

                </div>
                <!-- Projects header row stop -->

                <!-- Project cards row start -->
                <div class=\"row\">

                    ";
        // line 144
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["github_projects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
            // line 145
            echo "
                        <!-- Project card column start -->
                        <div class=\"col-12 mb-4\">

                            <!-- Project card start -->
                            <div class=\"card\">
                                <div class=\"card-body\">
                                    <h2 class=\"card-title\">";
            // line 152
            echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["project"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["name"] ?? null) : null), "html", null, true);
            echo " <span class=\"badge badge-secondary align-middle\">";
            echo twig_escape_filter($this->env, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = $context["project"]) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["language"] ?? null) : null), "html", null, true);
            echo "</span></h2>
                                    <p class=\"card-text\">";
            // line 153
            echo twig_escape_filter($this->env, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = $context["project"]) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["description"] ?? null) : null), "html", null, true);
            echo "</p>
                                    <a href=\"";
            // line 154
            echo twig_escape_filter($this->env, (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = $context["project"]) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["html_url"] ?? null) : null), "html", null, true);
            echo "\" target=\"_BLANK\" class=\"btn btn-primary\">View on GitHub</a>
                                </div>
                            </div>
                            <!-- Project card stop -->

                        </div>
                        <!-- Project card column end -->

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 163
        echo "
                </div>
                <!-- Project cards row end -->

            </div>
            <!-- Projects section end -->

            <!-- Footer row start -->
            <div class=\"row\">

                <!-- Copyright column start -->
                <div class=\"col-12 text-center\">
                    <p><span class=\"fas fa-fw fa-copyright\"></span><?= date('Y'); ?> ";
        // line 175
        echo twig_escape_filter($this->env, ($context["github_user_name"] ?? null), "html", null, true);
        echo "</p>
                </div>
                <!-- Copyright column end -->

            </div>
            <!-- Footer row end -->

        </div>
        <!-- Page container end -->

        <!-- Bootstrap JS -->
        <script
            src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\"
            integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\"
            crossorigin=\"anonymous\">
        </script>

        <!-- Font Awesome JS -->
        <script
            defer
            src=\"https://use.fontawesome.com/releases/v5.8.1/js/all.js\"
            integrity=\"sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ\"
            crossorigin=\"anonymous\">
        </script>

    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  268 => 175,  254 => 163,  239 => 154,  235 => 153,  229 => 152,  220 => 145,  216 => 144,  161 => 92,  157 => 91,  147 => 84,  143 => 83,  119 => 64,  91 => 39,  87 => 38,  55 => 9,  47 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index.html.twig", "/home/vagrant/code/briandady.com/templates/index.html.twig");
    }
}
