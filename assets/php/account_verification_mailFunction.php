<?php

    $text_subject='Ticket Booked.';
    $headers = 'MIME-Version: 1.0' . '\r\n';
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
    $headers .= 'From: dummy.sumitshrestha@gmail.com' . '\r\n';

    $to = 'sumitshrestha027@gmail.com';
    $subject = $text_subject;
    $body = "<!DOCTYPE html>
    <html>
    
    <head>
        <!-- font awesome cdn link  -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'>
        <!-- font awesome cdn link ends  -->
    
        <style>
            body {
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                text-decoration: none;
            }

            .table-content{
                border: none;
                height: auto;
                width: auto;
                text-align: center;
            }

            .table-content td img{
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            
            .email-container {
                background: #fff;
                border-radius: .5rem;
                text-align: center;
                padding: 3rem 2rem;
                outline-offset: -1rem;
                outline: black;
                box-shadow: rgb(75, 75, 75);
                display: flex;
                flex-direction: column;
                justify-content: center;
                margin: 20px;
            }
            
            .logo-container img {
                max-height: 8rem;
                max-width: auto;
                padding: 1rem 1rem;
            }
            
            .email-container .email-body-container .svg-container img {
                max-height: 24rem;
                max-width: auto;
                padding: 1rem 1rem;
            }
            
            .confirm-email-text {
                font-weight: bolder;
                font-size: 2.5rem;
                padding: 0;
            }
            
            .text-body {
                font-size: 1rem;
            }
            
            .otp-code .otp-code-area {
                margin: 2rem 0rem;
            }
            
            .otp-code span {
                margin: 2rem 0.5rem;
                border: 1px solid #2e72d1;
                border-radius: 25%;
                padding: 0.5rem 0.5rem;
                color: #fff;
                background-color: #2e72d1;
                font-size: 2rem;
                font-weight: bolder;
            }
            
            .footer-container .social-media-container a {
                display: inline-block;
                height: 40px;
                width: 40px;
                background-color: #ffffff;
                /* margin: 0 10px 10px 0; */
                text-align: center;
                line-height: 40px;
                border-radius: 50%;
                border: 1px solid #2e72d1;
                color: #2e72d1;
                transition: all 0.5s ease;
            }
            
            .footer-container {
                margin-top: 2rem;
            }
            
            .footer-container .social-media-container a:hover {
                color: #ffffff;
                background-color: #2e72d1;
            }
            
            .footer-text-body {
                color: #2e72d1;
            }
        </style>
    </head>
    
    <body>
        <table class='table-content'>
            <tr>
                <td>
                    <div class='email-container'>
                        <div class='logo-container'>
                            <img src='https://lh3.googleusercontent.com/pw/AM-JKLXCDX3KGE27TacsK_5uKgt5Dq7IStDVbrndJed3_GIgvCpshWjitsSIsnNV9QDPLWAIK5sXmoJVOXZ3vqB4uPsM740o6cVAQRc3GJ5AAKbraaVa8IE3fAh1jHwmllCeW17mYe56QYfSvbkjR4ym37VoNg=w858-h442-no?authuser=0'>
                        </div>
                </td>
            </tr>
                <div class='email-body-container'>
                    <tr>
                        <td>
                            <div class='confirm-email-text'>
                                Confirm Your Email
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='text-body'>
                                <p>You have received this message because your email address has been registered with our site.</p>
                            </div>
                        </td>
                    <tr>
                        <td>
                            <div class='text-body'>
                                <p>Please enter the OTP given below in our site to login.</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='otp-code'>
                                <div class='otp-code-area'>
                                    <span>1</span>
                                    <span>1</span>
                                    <span>1</span>
                                    <span>1</span>
                                    <span>1</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='text-body'>
                                <p><small>Once confirmed, this email will be uniquely associated with your account.</small></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='text-body'>
                                <p><small>If you did not register with us, please disregard this email.</small></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='footer-container'>
                                <div class='social-media-container'>
                                    <a href='https://facebook.com/TicketKinee'><i class='fab fa-facebook-f'></i></a>
                                    <a href='https://instagram.com/__ekinnnn__' target='_blank'><i class='fa-solid fab fa-laptop-code'></i></a>
                                    <a href='https://instagram.com/s1_1mit' target='_blank'><i class='fa-solid fa-database'></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='footer-text-body'>
                                <p><small>TicketKinee © 2022 TicketKinee, Inc. All Rights Reserved.</br>Kathmandu, Bagmati Province, Nepal.</small></p>
                            </div>
                        </td>
                    </tr>
                    </div>
                </div>
        </table>
    </body>
    
    </html>";

        

    $success=mail($to, $subject, $body, $headers);
    if (!$success) {
        echo('Not Successful');
    }

?>