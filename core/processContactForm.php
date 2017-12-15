<?php
//Include non-vendor files
require '../core/About/src/Validation/Validate.php';

use About\Validation;

$valid = new About\Validation\Validate();

$input = filter_input_array(INPUT_POST);

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
        }else{
            $message = "<div style =\"color: #ff0000;\">Please correct the errors below!</div>";
        }
}
