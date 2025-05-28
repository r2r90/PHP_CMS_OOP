<?php

class ContactController extends Controller
{
    function defaultAction()
    {
        include 'view/contact-us.html';
    }

    function submitContactFormAction(): void
    {
        // validate
        // store data
        // send email

        include 'view/contact-thank.html';
    }


}


