<?php

class AboutUsController extends Controller
{
    function defaultAction(): void
    {
        $variables['title'] = 'About Us Page';
        $variables['content'] = 'About Us Page Content - About Us bla bla bla bla';

        $template = new Template('default');
        $template->view('static-page', $variables);

    }

}
