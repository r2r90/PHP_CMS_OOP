<?php

class HomePageController extends Controller
{
    function defaultAction(): void
    {
        $variables['title'] = 'Home Page Title';
        $variables['content'] = 'Home Page Content- Welcome To Home Page';

        $template = new Template('default');


        $template->view('static-page', $variables);
    }
}
