<?php

class ContactController extends Controller
{
    function runBeforeAction(): bool
    {
        if ($_SESSION['has-submitted-the-form'] ?? 0 == 1) {
            include 'view/contact/contact-already-submitted.html';
            return false;
        }
        return true;
    }

    function defaultAction()
    {
        var_dump($_SESSION);
        include 'view/contact/contact-us.html';
    }

    function submitContactFormAction(): void
    {
        // validate
        // store data
        // send email
        $_SESSION['has-submitted-the-form'] = 1;
        include 'view/contact/contact-thank.html';
    }


}


