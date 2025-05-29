<?php

class ContactController extends Controller
{

    function runBeforeAction(): bool
    {
        if ($_SESSION['has-submitted-the-form'] ?? 0 == 1) {

            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $pageObj = new Page($dbc);
            $pageObj->findBy('id', $this->entityId);
            $variables['pageObj'] = $pageObj;

            $template = new Template('default');
            $template->view('contact/contact-us', $variables);
            return false;
        }
        return true;
    }

    function defaultAction(): void
    {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $pageObj = new Page($dbc);
        $pageObj->findBy('id', $this->entityId);
        $variables['pageObj'] = $pageObj;
        $template = new Template('default');
        $template->view('contact/contact-us', $variables);
    }

    function submitContactFormAction(): void
    {
        // validate
        // store data
        // send email
        $_SESSION['has-submitted-the-form'] = 1;


        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $pageObj = new Page($dbc);
        $pageObj->findBy('id', $this->entityId);
        $variables['pageObj'] = $pageObj;
        $template = new Template('default');
        $template->view('static-page', $variables);
    }


}


