<?php
//Include non-vendor files
require '../core/About/src/Validation/Validate.php';
# Include the Autoloader (see "Libraries" for install instructions)
require '../vendor/autoload.php';
require '../../keys.php';

use About\Validation;

use Mailgun\Mailgun;

$valid = new About\Validation\Validate();

$input = filter_input_array(INPUT_POST);
var_dump($input);
$message = null;

if(!empty($input)){

    $valid->validation = [
        'first_name'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please enter your first name'
        ]],
        'last_name'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please enter your last name'
        ]],
        'email'=>[[
                'rule'=>'email',
                'message'=>'Please enter a valid email'
            ],[
                'rule'=>'notEmpty',
                'message'=>'Please enter an email'
        ]],
        'subject'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please enter a subject'
        ]],
        'message'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please add a message'
        ]],
    ];

    $valid->check($input);
    //var_dump($this->errors);

        if(empty($valid->errors) && !empty($input)){
            $message = "<div style =\"color: #00ff00;\">Your form has been submitted!</div>";
            //use Mailgun\Mailgun;

            # Instantiate the client.
            $mgClient = new Mailgun($mailgunkey);
            $domain = "sandbox64e70fbb6d17444da05bfb9872ce2bbe.mailgun.org";

            # Make the call to the client.
            $result = $mgClient->sendMessage("$domain",
                      array('from'    => "{$input['first_name']} {$input['last_name']} <{$input['email']}>",
                            'to'      => 'Manuel Salinas <manny.salinas1980@gmail.com>',
                            'subject' => $input['subject'],
                            'text'    => $input['subject']
                        ));

            var_dump($result);
        }else{
            $message = "<div style =\"color: #ff0000;\">Please correct the errors below!</div>";

        }
}
