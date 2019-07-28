<?php

namespace Core;

interface TemplateInterface
{
    public function Render(string $templateName, $data);
}