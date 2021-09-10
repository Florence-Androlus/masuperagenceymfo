<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact{

        /**
         * @var string|null
         * @Assert\NotBlank()
         * @Assert\Length(min=2, max=100)
         */
        private $firstname;

        /**
         * @var string|null
         * @Assert\NotBlank()
         * @Assert\Length(min=2, max=100)
         */
        private $lastname;        

        /**
         * @var string|null
         * @Assert\NotBlank()
         * @Assert\regex(
         *  pattern="/[0-9]{10}/"
         * )
         */
        private $phone;

        /**
         * @var string|null
         * @Assert\NotBlank()
         * @Assert\Email()
         */
        private $email;

        /**
         * @var string|null
         * @Assert\NotBlank()
         * @Assert\Length(min=10)
         */
        private $message;

        /**
         * @var Property|null
         */
        private $property;

        /**
         * Get the value of firstname
         */
        public function getFirstname()
        {
                return $this->firstname;
        }

        /**
         * Set the value of firstname
         */
        public function setFirstname($firstname): self
        {
                $this->firstname = $firstname;

                return $this;
        }

        /**
         * Get the value of lastname
         */
        public function getLastname()
        {
                return $this->lastname;
        }

        /**
         * Set the value of lastname
         */
        public function setLastname($lastname): self
        {
                $this->lastname = $lastname;

                return $this;
        }

        /**
         * Get pattern="/[0-9]{10}/"
         *
         * @return  string|null
         */ 
        public function getPhone()
        {
                return $this->phone;
        }

        /**
         * Set pattern="/[0-9]{10}/"
         *
         * @param  string|null  $phone  pattern="/[0-9]{10}/"
         *
         * @return  self
         */ 
        public function setPhone($phone)
        {
                $this->phone = $phone;

                return $this;
        }

        /**
         * Get the value of email
         */
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         */
        public function setEmail($email): self
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of message
         */
        public function getMessage()
        {
                return $this->message;
        }

        /**
         * Set the value of message
         */
        public function setMessage($message): self
        {
                $this->message = $message;

                return $this;
        }

        public function getProperty()
        { 
                return $this->property; 
        }

        public function setProperty($property): self 
        { 
                $this->property = $property; return $this; 
        }
    }