<?php

function send_verified_mail($activation_code, $receive_email) {
    $CI = & get_instance();
    $CI->load->helper('settings');
    $configs = getSettings(EMAIL_SETTING_FILE);
    $conf_contact = getSettings(CONTACT_INFO_SETTING_FILE);
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
    $conf_contact = getSettings(CONTACT_INFO_SETTING_FILE);
    $conf_general = getSettings(GENERAL_SETTING_FILE);
    $CI->load->library('email', $configs);
    $CI->email->initialize($configs);
    $subject = $CI->lang->line('verified_label');
    $body = '<html>
                <head>
                    <title>Kode Verifikasi</title>
                </head>
                <body style="font-family: Arial, Helvetica, sans-serif;">
                    <div style="width:100%; height:auto;">
                        <table cellpadding="10" style="table-layout: auto; border-collapse: separate; width: 100%; border:0px;" cellspacing="0">
                            <thead>
                                <tr style="background-color: rgba(190, 104, 170, 0.31);">
                                    <td style=" width: 10%; ">
                                        <a href="'.  base_url().'"><img src="' . base_url() . '/img/icon/apple-icon-180x180.png" style="width:100px; vertical-align: right; padding-left: 5px;"/></a>
                                    </td>
                                    <td style="width:80%;">
                                        <h1 style="margin-top:auto;margin-bottom: auto; "><a href="#" style="text-decoration:none; color:#8692c9;">'.$conf_general['title'].'</a></h1>
                                        <p style="margin-top:-1px;"><b>Selamat datang pengguna baru</b></p>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" style="padding:15px;">
                                        <div style="max-width: 75%;">
                                            <p>
                                                Terima kasih telah bergabung di '.$conf_general['title'].', <p>aktifkan segera profil mu dengan kode aktifasi berikut : <b>'.$verified_code.'</b></p>
                                            </p>
                                        </div>
                                        <br>

                                        <p>
                                            Salam hangat,
                                            <br><br>
                                            <i>Team '.$conf_general['title'].' Development</i>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="background-color: #cfcccc;text-align: center;">
                                        <small>
                                            '.$conf_general['copyright'].'
                                            <br>
                                            '.$conf_contact['address'].'
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

function send_welcome_subscribe_email($categories_name, $types_name, $cities_name, $county_name, $name, $phone, $email, $price_1, $price_2, $generated_url) {
    $CI = & get_instance();
    $CI->load->helper('settings');
    $configs = getSettings(EMAIL_SETTING_FILE);
    $CI->load->library('email', $configs);
    $CI->email->initialize($configs);
    $subject = 'Welcome at rumaqu we hope you enjoy the services'; //$CI->lang->line('verified_label');
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
                                        <p style="margin-top:-1px;"><b>Thanks for using our subscriber feature</b></p>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" style="padding:15px;">
                                        <div style="max-width: 75%;">
                                            <p>
                                                Hi, <b>' . $name . '</b> <br>
                                                We will notify you shortly if we have data are in accordance with the criteria that you have set, with the following request:
                                            </p>
                                            <table>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Category</td>
                                                    <td>' . $categories_name . '</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Types</td>
                                                    <td>' . $types_name . '</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Location    </td>
                                                    <td>' . $cities_name . ',' . $county_name . '</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Phone</td>
                                                    <td>' . $phone . '</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Email</td>
                                                    <td>' . $email . '</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Price Range</td>
                                                    <td>' . $price_1 . ' - ' . $price_2 . '</td>
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
                                    <td colspan="2" style="background-color: #be68aa; text-align: center;">
                                        <p style="color:#fff;">
                                            <b>
                                                If you willing to update your criteria please click button below:
                                            </b>
                                        </p>
                                        <a href="' . base_url() . 'upref?v=u&email=' . $email . '&url=' . $generated_url . '" target="_blank" style=" text-decoration: none; "><button style="background-color: #fbd759; border: none; padding: 5px 32px; text-align: center; display: block;font-size: 16px; cursor:pointer; margin-left:auto; margin-right: auto; font-weight: bold;" type="button">Visit</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="background-color: #cfcccc;text-align: center;">
                                        <small>
                                            If you do not want to receive our notification, from KoclakDev, please unsubscribe. <a href="' . base_url() . 'unsub?email=' . $email . '&url=' . $generated_url . '">unsubscribe link</a> <br>
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

function send_newsletter_email($email, $name, $array_estates, $generated_url) {
    $CI = & get_instance();
    $CI->load->helper('settings');
    $configs = getSettings(EMAIL_SETTING_FILE);
    $CI->load->library('email', $configs);
    $CI->email->initialize($configs);
    $subject = 'Newsletter at rumaqu.com, look what we have just found for you'; //$CI->lang->line('verified_label');
    $body = '<html>
                <head>
                    <title>Newsletter from Rumahqu.com</title>
                </head>
                <body style="font-family: Arial, Helvetica, sans-serif;">
                    <div style="width:100%; height:auto;">
                        <table cellpadding="10" style="table-layout: auto; border-collapse: separate; width: 100%; border:0px;" cellspacing="0">
                            <thead>
                                <tr style="background-color: rgba(190, 104, 170, 0.31);">
                                    <td style=" width: 10%; ">
                                        <a href="' . base_url() . '"><img src="' . base_url() . '/img/icon/apple-icon-180x180.png" style="width:100px; vertical-align: right; padding-left: 5px;"/></a>
                                    </td>
                                    <td style="width:80%;">
                                        <h1 style="margin-top:auto;margin-bottom: auto; "><a href="' . base_url() . '" style="text-decoration:none; color:#8692c9;">Rumaqu.com</a></h1>
                                        <p style="margin-top:-1px;"><b>Newsletter notification estates</b></p>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" style="padding:15px;">
                                        <div style="max-width: 100%;">
                                            <p>
                                                Hi, <b>' . $name . '</b> <br>
                                                 We has found estate that matches your criteria :
                                            </p>
                                            <table style="table-layout: auto; border-collapse: separate; width: 100%; border:0px;" cellspacing="0">';
    if ($array_estates != null) {
        foreach ($array_estates as $row_estates) {
            $body.='<tr>
                        <td style="width: 20%;">
                        ';
            if ($row_estates['estates_img'] != null) {
                $body.='<img style="max-height: 130px; max-width: 250px;" src="' . base_url() . $row_estates['estates_img'] . '"/>';
            } else {
                $body.='<img style="max-height: 130px; max-width: 250px;" src="' . base_url() . 'statics/images/no_photo.png"/>';
            }

            $body.='</td>
                    <td style="width:80%; vertical-align: text-top; padding: 10px;">
                        <div style="width:100%; text-align: left;"><h2>' . $row_estates['estates_title'] . '</h2></div>
                        <div style="width:100%;">Address: ' . $row_estates['estates_address'] . '</div>
                        <div style="width:100%;">Facility : ' . $row_estates['estates_amenities'] . '</div>
                        <div style="width:100%;">Price: ' . $row_estates['estates_price'] . '</div>
                        <div style="width:100%;"><a href="'.base_url().'search/' . $row_estates['estates_id'] . '" target="_blank"><button style="float:right; background-color: #4CAF50; border: none; color: white; padding: 5px 32px; text-align: center; text-decoration: none;display: inline-block;font-size: 16px; cursor:pointer;" type="button">Visit</button></a></div>
                    </td>
                    </tr>';
        }
    }
    $body .='</table>
                                        </div>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>
                                            Regards,
                                            <br><br>
                                            Koclak Team Dev
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="background-color: #be68aa; text-align: center;">
                                        <p style="color:#fff;">
                                            <b>
                                                If you willing to update your criteria please click button below:
                                            </b>
                                        </p>
                                        <a href="' . base_url() . 'upref?v=u&email=' . $email . '&url=' . $generated_url . '" target="_blank" style=" text-decoration: none; "><button style="background-color: #fbd759; border: none; padding: 5px 32px; text-align: center; display: block;font-size: 16px; cursor:pointer; margin-left:auto; margin-right: auto; font-weight: bold;" type="button">Visit</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="background-color: #cfcccc;text-align: center;">
                                        <small>
                                            If you don not want to receive our notification, from KoclakDev, please unsubscribe. <a href = "' . base_url() . 'unsub?email=' . $email . '&url=' . $generated_url . '">unsubscribe link</a> <br>
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

function send_update_preference_newsletter($email, $generated_url) {
    $CI = & get_instance();
    $CI->load->helper('settings');
    $configs = getSettings(EMAIL_SETTING_FILE);
    $CI->load->library('email', $configs);
    $CI->email->initialize($configs);
    $subject = 'Request Update Preferences at rumaqu.com';
    $body = '<html>
                <head>
                    <title>Estate at Rumahqu.com</title>
                </head>
                <body style="font-family: Arial, Helvetica, sans-serif;">
                    <div style="width:100%; height:auto;">
                        <table cellpadding="10" style="table-layout: auto; border-collapse: separate; width: 100%; border:0px;" cellspacing="0">
                            <thead>
                                <tr style="background-color: rgba(190, 104, 170, 0.31);">
                                    <td style=" width: 10%; ">
                                        <a href="' . base_url() . '"><img src="' . base_url() . '/img/icon/apple-icon-180x180.png" style="width:100px; vertical-align: right; padding-left: 5px;"/></a>
                                    </td>
                                    <td style="width:80%;">
                                        <h1 style="margin-top:auto;margin-bottom: auto; "><a href="#" style="text-decoration:none; color:#8692c9;">Rumaqu.com</a></h1>
                                        <p style="margin-top:-1px;"><b>Newsletter notification estates</b></p>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" style="padding:15px;">
                                        <div style="max-width: 100%;">
                                            <p>
                                                Hi, <b>Adam</b> <br>
                                                Please follow link above to update your preferences :
                                            </p>
                                            <a href="' . base_url() . 'upref?v=u&email=' . $email . '&url=' . $generated_url . '" target="_blank">' . base_url() . $generated_url . '</a>
                                        </div>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>
                                            Regards,
                                            <br><br>
                                            Koclak Team Dev
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="background-color: #cfcccc;text-align: center;">
                                        <small>
                                            If you do not want to receive our notification, from KoclakDev, please unsubscribe. <a href="' . base_url() . 'unsub?email=' . $email . '&url=' . $generated_url . '">unsubscribe link</a> <br>
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

function send_req_update_preferences_success($categories_name, $types_name, $cities_name, $county_name, $name, $phone, $email, $price_1, $price_2, $generated_url) {
    $CI = & get_instance();
    $CI->load->helper('settings');
    $configs = getSettings(EMAIL_SETTING_FILE);
    $CI->load->library('email', $configs);
    $CI->email->initialize($configs);
    $subject = 'Update preferences was successfull at rumaqu '; //$CI->lang->line('verified_label');
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
                                        <p style="margin-top:-1px;"><b>Thanks for using our subscriber feature</b></p>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" style="padding:15px;">
                                        <div style="max-width: 75%;">
                                            <p>
                                                Hi, <b>' . $name . '</b> <br>
                                                We have updated the criteria that you have set, with the following request:
                                            </p>
                                            <table>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Category</td>
                                                    <td>' . $categories_name . '</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Types</td>
                                                    <td>' . $types_name . '</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Location    </td>
                                                    <td>' . $cities_name . ',' . $county_name . '</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Phone</td>
                                                    <td>' . $phone . '</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Email</td>
                                                    <td>' . $email . '</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; padding-right: 30px">Price Range</td>
                                                    <td>' . $price_1 . ' - ' . $price_2 . '</td>
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
                                    <td colspan="2" style="background-color: #be68aa; text-align: center;">
                                        <p style="color:#fff;">
                                            <b>
                                                If you willing to update your criteria please click button below:
                                            </b>
                                        </p>
                                        <a href="' . base_url() . 'upref?v=u&email=' . $email . '&url=' . $generated_url . '" target="_blank" style=" text-decoration: none; "><button style="background-color: #fbd759; border: none; padding: 5px 32px; text-align: center; display: block;font-size: 16px; cursor:pointer; margin-left:auto; margin-right: auto; font-weight: bold;" type="button">Visit</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="background-color: #cfcccc;text-align: center;">
                                        <small>
                                            If you do not want to receive our notification, from KoclakDev, please unsubscribe. <a href="' . base_url() . 'unsub?email=' . $email . '&url=' . $generated_url . '">unsubscribe link</a> <br>
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