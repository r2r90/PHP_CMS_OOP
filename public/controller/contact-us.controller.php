<?php

class ContactController extends Controller
{
    function runBeforeAction(): bool
    {
        if ($_SESSION['has-submitted-the-form'] ?? 0 == 1) {

            $variables['title'] = "You have already contacted us!";
            $variables['content'] = "We will back to you very soon!!!";
            $template = new Template('default');
            $template->view('static-page', $variables);
            return false;
        }
        return true;
    }

    function defaultAction(): void
    {
        $variables['title'] = "Contact Us";
        $variables['content'] = "Share your problem with us!";
        $template = new Template('default');
        $template->view('contact/contact-us', $variables);
    }

    function submitContactFormAction(): void
    {
        // validate
        // store data
        // send email
        $_SESSION['has-submitted-the-form'] = 1;


        $variables['title'] = "Thank you for contacting us";
        $variables['content'] = "We reply in few days.";
        $template = new Template('default');
        $template->view('static-page', $variables);
    }


}


