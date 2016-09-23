<?php

function send_verified_mail($activation_code, $receive_email) {
    $CI = & get_instance();
    $CI->load->helper('settings');
    $configs = getSettings(EMAIL_SETTING_FILE);
    $CI->load->library('email', $configs);
    $CI->email->initialize($configs);
    $subject = $CI->lang->line('verified_label');
    $body = '<p>' . $CI->lang->line('verified_msg') . '&nbsp;<a href="' . base_url() . 'users/activation?code=' . $activation_code . '">' . base_url() . 'users/activation?code=' . $activation_code . '</a><p>';
    $result = $CI->email
            ->from($configs['from_email'], $configs['from_user'])
            ->to($receive_email)
            ->subject($subject)
            ->message($body)
            ->send();
}

function send_verified_code($verified_code, $receive_email) {
    $CI = & get_instance();
    $CI->load->helper('settings');
    $configs = getSettings(EMAIL_SETTING_FILE);
    $CI->load->library('email', $configs);
    $CI->email->initialize($configs);
    $subject = $CI->lang->line('verified_label');
    $body = '<p>' . $CI->lang->line('verified_code_msg') . '&nbsp;<b>' .
            $verified_code . '</b><p>';
    $result = $CI->email
            ->from($configs['from_email'], $configs['from_user'])
            ->to($receive_email)
            ->subject($subject)
            ->message($body)
            ->send();
}

function send_enquiry($message, $receive_email = "luann4099@gmail.com", $reply_to = "beginlive@gmail.com", $user_name) {
    $CI = & get_instance();
    $CI->load->helper('settings');
    $configs = getSettings(EMAIL_SETTING_FILE);
    $configs['from_user'] = $user_name;
    $configs['from_email'] = $reply_to;
    $CI->load->library('email', $configs);
    $CI->email->initialize($configs);
    $subject = $CI->lang->line('subject_enquiry_msg') . ' ' . $user_name;
    $body = '<p>' . $user_name . '&nbsp;' . $CI->lang->line('enquiry_msg') . '<p>' . '<p>---------</p>' . $message . '<p>---------</p>' . $CI->lang->line('response_enquiry_msg');
    $result = $CI->email
            ->from($configs['from_email'], $configs['from_user'])
            ->to($receive_email)
            ->subject($subject)
            ->message($body)
            ->reply_to($reply_to)
            ->send();
}

function reply_contact($subject, $content, $receive_email) {
    $CI = & get_instance();
    $CI->load->helper('settings');
    $configs = getSettings(EMAIL_SETTING_FILE);
    $configs['from_user'] = 'noreply';
    $CI->load->library('email', $configs);
    $CI->email->initialize($configs);
    $body = $content;
    $result = $CI->email
            ->from($configs['from_email'], $configs['from_user'])
            ->to($receive_email)
            ->subject($subject)
            ->message($body)
            ->send();
}

function send_welcome_subscribe_email($categories_name, $types_name, $cities_name, $county_name, $name, $phone, $email, $price_1, $price_2) {
    $CI = & get_instance();
    $CI->load->helper('settings');
    $configs = getSettings(EMAIL_SETTING_FILE);
    $CI->load->library('email', $configs);
    $CI->email->initialize($configs);
    $subject = 'Welcome ';//$CI->lang->line('verified_label');
    $body = '<html>
                <head>
                    <title>Thank You For Subscribe at Rumahqu.com</title>
                </head>
                <body style="font-family: Arial, Helvetica, sans-serif;">
                    <div style="width:100%; height:auto;">
                        <table cellpadding="10" style="table-layout: auto; border-collapse: separate; width: 100%; border:0px;" cellspacing="0">
                            <thead>
                                <tr style="background-color: rgba(190, 104, 170, 0.31);">
                                    <td style=" width: 10%; ">
                                        <a href="#"><img src="' . base_url() . '/img/icon/apple-icon-180x180.png" style="width:100px; vertical-align: right; padding-left: 5px;"/></a>
                                    </td>
                                    <td style="width:80%;">
                                        <h1 style="margin-top:auto;margin-bottom: auto; "><a href="#" style="text-decoration:none; color:#8692c9;">Rumaqu.com</a></h1>
                                        <p style="margin-top:-1px;">Thanks for using our subscriber feature</p>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" style="padding:15px;">
                                        <div style="max-width: 75%;">
                                            <p>
                                                Hi, <b>'.$name.'</b> <br>
                                                We will notify you shortly if we have data are in accordance with the criteria that you have set, with the following request:
                                            </p>
                                            <table>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Category</td>
                                                    <td>'.$categories_name.'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Types</td>
                                                    <td>'.$types_name.'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Location    </td>
                                                    <td>'.$cities_name.',' .$county_name.'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Phone</td>
                                                    <td>'.$phone.'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Email</td>
                                                    <td>'.$email.'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Price Range</td>
                                                    <td>'.$price_1.' - '.$price_2.'</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <br>

                                        <p>
                                            Regards,
                                            <br><br>
                                            Koclak Team Dev
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="background-color: #cfcccc;text-align: center;">
                                        <small>
                                            If you do not want to receive our notification, from KoclakDev, please unsubscribe. <a href="#">unsubscribe link</a> <br>
                                            Copyright © 2016 KoclakDev (2300 Geng Road, Suite 250 Palo Alto, California 94303), All rights reserved.
                                        </small>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                </body>
            </html>';
    $result = $CI->email
            ->from($configs['from_email'], $configs['from_user'])
            ->to($email)
            ->subject($subject)
            ->message($body)
            ->send();
    return $result;
}

?>