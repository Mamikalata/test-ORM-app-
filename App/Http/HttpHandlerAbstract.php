<?php

namespace App\Http;

class HttpHandlerAbstract
{
    /**
     * @var \Core\TemplateInterface
     */
    protected $template;

    /**
     * HttpHandlerAbstract constructor.
     * @param \Core\TemplateInterface $template
     */
    public function __construct(\Core\TemplateInterface $template)
    {
        $this->template = $template;
    }

    public function Render(string $templateName, array $data = null)
    {
        $this->template->Render($templateName, $data);
    }

    public function Redirect(string $url)
    {
        header("Location: $url");
    }
}