<?php
namespace App\Notification;

use Twig\Environment;
use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactNotification extends AbstractController{

    /**
     * @var \Swift_Mailer 
     */
    private $mailer;

    /** 
     * @var Environment 
     */
    private $renderer;

 /*   public function __construct(\Swift_Mailer $mailer,Environment $renderer)
    {
        $this->mailer=$mailer;
        $this->renderer=$renderer;
    }

    public function notify(Contact $contact){
        $email = (new \Swift_Message( 'Agence : '. $contact->getProperty()->getTitle()))
        ->setFrom('noreply@agence.com')
        ->setTo('contact@agence.com')
        ->setReplyTo($contact->getEmail())
        ->setBody($this->renderer->render('emails/contact.html.twig',[
            'contact'=>$contact
        ]),'text/html');

        $this->mailer->send($email);
    }*/
}