<html>
    <head>
        <title> Automator</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
    <body>
        <h2 align="center"> ONCE THE PAGE LOADS CLOSE THE PAGE</h2>
    <?php
    /* Replace String Function*/
    function replace_string_in_file($filename, $string_to_replace, $replace_with){
        
    $content=file_get_contents($filename);
    $content_chunks=explode($string_to_replace, $content);
    $content=implode($replace_with, $content_chunks);
    file_put_contents($filename, $content);
    
    }
    
    /* USER BUNDLE CHANGES*/
    
    $user_filename="../app/bundles/UserBundle/Translations/en_US/messages.ini";
    
    /*Password reset Email Subject*/
    $reset_email_string_to_replace= "mautic.user.user.passwordreset.subject=\"Mautic password reset\"";
    $reset_email_replace_with= "mautic.user.user.passwordreset.subject=\"Campact password reset\"";
    replace_string_in_file($user_filename, $reset_email_string_to_replace, $reset_email_replace_with);
    
    /*EMAIL BUNDLE CHANGES*/
    $email_filename ="../app/bundles/EmailBundle/Translations/en_US/messages.ini";
    
    /*Test Email Body*/
    $test_email_body_string_to_replace= "mautic.email.config.mailer.transport.test_send.body=\"Hi! This is a test email from Mautic. Testing...testing...1...2...3!\"";
    $test_email_body_replace_with= "mautic.email.config.mailer.transport.test_send.body=\"Hi! This is a test email from Campact. Testing...testing...1...2...3!\"";
    replace_string_in_file($email_filename, $test_email_body_string_to_replace, $test_email_body_replace_with);
    
    /*Test Email Subject*/
    
    $test_email_sub_string_to_replace= "mautic.email.config.mailer.transport.test_send.subject=\"Mautic testemail\"";
    $test_email_sub_replace_with= "mautic.email.config.mailer.transport.test_send.subject=\"Campact test email\"";
    replace_string_in_file($email_filename, $test_email_sub_string_to_replace, $test_email_sub_replace_with);
    
    /*tooltip text1 in Email List*/
    
    $tooltip_email_list_a_string_to_replace= "mautic.email.stat.tooltip=\"Details may not match summary numbers if the contact no longer exists in your Mautic Account or if a contact was sent or read an email multiple times\"";
    $tooltip_email_list_a_replace_with= "mautic.email.stat.tooltip=\"Details may not match summary numbers if the contact no longer exists in your Account or if a contact was sent or read an email multiple times\"";
    replace_string_in_file($email_filename, $tooltip_email_list_a_string_to_replace, $tooltip_email_list_a_replace_with);
    
    /*tooltip text2 in Email List*/
    
    $tooltip_email_list_b_string_to_replace= "mautic.email.stat.simple.tooltip=\"Details may not match summary numbers if the contact no longer exists in your Mautic Account\"";
    $tooltip_email_list_b_replace_with= "mautic.email.stat.simple.tooltip=\"Details may not match summary numbers if the contact no longer exists in your Account\"";
    replace_string_in_file($email_filename, $tooltip_email_list_b_string_to_replace, $tooltip_email_list_b_replace_with);
    
    /*Email configuration*/
    
    $email_conf_a_string_to_replace= "mautic.email.config.mailer.from.name.tooltip=\"Set the from name for email sent by Mautic\"";
    $email_conf_a_replace_with= "mautic.email.config.mailer.from.name.tooltip=\"Set the from name for email sent by Campact\"";
    replace_string_in_file($email_filename, $email_conf_a_string_to_replace, $email_conf_a_replace_with);
    
    $email_conf_b_string_to_replace= "mautic.email.config.mailer.from.email.tooltip=\"Set the from email for email sent by Mautic\"";
    $email_conf_b_replace_with= "mautic.email.config.mailer.from.email.tooltip=\"Set the from email for email sent by Campact\"";
    replace_string_in_file($email_filename, $email_conf_b_string_to_replace, $email_conf_b_replace_with);
    
    $email_conf_c_string_to_replace= "mautic.email.config.mailer.transport.tooltip=\"Set the service email should be sent through. Mautic is not affiliated with any of these services but simply supply their SMTP settings for convenience.\"";
    $email_conf_c_replace_with= "mautic.email.config.mailer.transport.tooltip=\"Set the service email should be sent through. Campact is not affiliated with any of these services but simply supply their SMTP settings for convenience.\"";
    replace_string_in_file($email_filename, $email_conf_c_string_to_replace, $email_conf_c_replace_with);
    
    $email_conf_d_string_to_replace= "mautic.email.config.monitored_email_override_settings.tooltip=\"If yes, configure custom connection settings for this mailbox. Otherwise, Mautic will use the default mailbox.\"";
    $email_conf_d_replace_with= "mautic.email.config.monitored_email_override_settings.tooltip=\"If yes, configure custom connection settings for this mailbox. Otherwise, Campact will use the default mailbox.\"";
    replace_string_in_file($email_filename, $email_conf_d_string_to_replace, $email_conf_d_replace_with);
    
    $email_conf_e_string_to_replace= "mautic.email.custom_headers.config.tooltip=\"Define custom headers to use for any outgoing email that is not associated with a Mautic Email. This includes password reset emails, emails to Mautic users, form post results, directly composed email to contacts, etc. If custom headers are required for an Email (used in campaigns or broadcasts), set customer headers in the Advanced tab of the Email.\"";
    $email_conf_e_replace_with= "mautic.email.custom_headers.config.tooltip=\"Define custom headers to use for any outgoing email that is not associated with a Campact Email. This includes password reset emails, emails to Campact users, form post results, directly composed email to contacts, etc. If custom headers are required for an Email (used in campaigns or broadcasts), set customer headers in the Advanced tab of the Email.\"";
    replace_string_in_file($email_filename, $email_conf_e_string_to_replace, $email_conf_e_replace_with);
    
    /*FOCUS PLUGIN CHANGES*/
    
    $focus_plugin_filename ="../plugins/MauticFocusBundle/Translations/en_US/messages.ini";
    
    /*Focus Item builder*/
    $focus_item_string_to_replace= "mautic.focus.form.type.form_description = \"Use a Mautic form to collect data from the visitor.\"";
    $focus_item_replace_with= "mautic.focus.form.type.form_description = \"Use a Form to collect data from the visitor.\"";
    replace_string_in_file($focus_plugin_filename, $focus_item_string_to_replace, $focus_item_replace_with);
    
    /*Campaign Bundle Changes*/
    $campaign_bundle_filename="../app/bundles/CampaignBundle/Translations/en_US/messages.ini";
    
    /*Campaign builder Changes */
    $campaign_builder_string_to_replace= "mautic.campaign.event.action.descr=\"An action is something executed by Mautic (e.g. send an email).\"";
    $campaign_builder_replace_with= "mautic.campaign.event.action.descr=\"An action is something executed (e.g. send an email).\"";
    replace_string_in_file($campaign_bundle_filename, $campaign_builder_string_to_replace, $campaign_builder_replace_with);
    
    
    /*CORE BUNDLE CHANGES*/
    $core_filename="../app/bundles/CoreBundle/Translations/en_US/messages.ini";
    
    /* changing System settings*/
    
    $sys_a_string_to_replace= "mautic.core.config.form.webroot=\"Mautic's root URL\"";
    $sys_a_replace_with= "mautic.core.config.form.webroot=\"Root URL\"";
    replace_string_in_file($core_filename,  $sys_a_string_to_replace, $sys_a_replace_with);
    
    $sys_b_string_to_replace= "mautic.core.config.form.webroot.dashboard=\"Mautic's dashboard\"";
    $sys_b_replace_with= "mautic.core.config.form.webroot.dashboard=\"Dashboard\"";
    replace_string_in_file($core_filename,  $sys_b_string_to_replace, $sys_b_replace_with);
    
    $sys_c_string_to_replace= "mautic.core.config.form.webroot.tooltip=\"Choose the page to show when browsing to Mautic's root URL (i.e. http://your-mautic-site.com/). Leave blank to be redirected to Mautic's dashboard.\"";
    $sys_c_replace_with= "mautic.core.config.form.webroot.tooltip=\"Choose the page to show when browsing to Root URL (i.e. http://your-site.com/). Leave blank to be redirected to Dashboard.\"";
    replace_string_in_file($core_filename,  $sys_c_string_to_replace, $sys_c_replace_with);
    
    $sys_d_string_to_replace= "mautic.core.config.form.ip.lookup.service.tooltip=\"Set the service to use to lookup geographical information from an IP address. Note that some of the services listed are commercial services. Mautic is not affiliated with the listed services but provide them for convenience.\"";
    $sys_d_replace_with="mautic.core.config.form.ip.lookup.service.tooltip=\"Set the service to use to lookup geographical information from an IP address. Note that some of the services listed are commercial services. Campact is not affiliated with the listed services but provide them for convenience.\"";
    replace_string_in_file($core_filename,  $sys_d_string_to_replace, $sys_d_replace_with);

    /*API BUNDLE CHANGES*/
    
    $api_filename="../app/bundles/ApiBundle/Translations/en_US/messages.ini";
    
    /*Api Settings*/
    
    $api_a_string_to_replace= "mautic.api.config.form.api.enabled.tooltip=\"Enable Mautic's API?\"";
    $api_a_replace_with= "mautic.api.config.form.api.enabled.tooltip=\"Enable API?\"";
    replace_string_in_file($api_filename,  $api_a_string_to_replace, $api_a_replace_with);
    
    $api_b_string_to_replace= "mautic.api.config.form.api.basic_auth.tooltip=\"Enable HTTP basic authentication for Mautic's API. It is highly recommended to only use this with secure sites (HTTPS).\"";
    $api_b_replace_with= "mautic.api.config.form.api.basic_auth.tooltip=\"Enable HTTP basic authentication for API. It is highly recommended to only use this with secure sites (HTTPS).\"";
    replace_string_in_file($api_filename,$api_b_string_to_replace,$api_b_replace_with);
    
    $api_c_string_to_replace= "mautic.api.error.api.disabled=\"API disabled. You need to enable the API in the API settings page of your Mautic account.\"";
    $api_c_replace_with= "mautic.api.error.api.disabled=\"API disabled. You need to enable the API in the API settings page of your Campact account.\"";
    replace_string_in_file($api_filename,  $api_c_string_to_replace, $api_c_replace_with);
    
    $api_d_string_to_replace= "mautic.api.client.form.confirmdelete=\"Delete the API client, %name%? Applications using this client will no longer have access to Mautic's API.\"";
    $api_d_replace_with= "mautic.api.client.form.confirmdelete=\"Delete the API client, %name%? Applications using this client will no longer have access to API.\"";
    replace_string_in_file($api_filename,  $api_d_string_to_replace, $api_d_replace_with);
    
    $api_e_string_to_replace= "mautic.api.error.basic.auth.disabled=\"Basic Auth disabled. You need to enable HTTP basic auth in the API settings page of your Mautic account.\"";
    $api_e_replace_with= "mautic.api.error.basic.auth.disabled=\"Basic Auth disabled. You need to enable HTTP basic auth in the API settings page of your Campact account.\"";
    replace_string_in_file($api_filename,  $api_e_string_to_replace, $api_e_replace_with);
    
    /*PAGE BUNDLE CHANGES*/
    
    $page_filename="../app/bundles/PageBundle/Translations/en_US/messages.ini";
    
    /*Tracking Settings*/
    
    $track_a_string_to_replace= "mautic.config.tab.pagetracking=\"Mautic tracking settings\"";
    $track_a_replace_with= "mautic.config.tab.pagetracking=\"Tracking settings\"";
    replace_string_in_file($page_filename, $track_a_string_to_replace, $track_a_replace_with);
    
    $track_b_string_to_replace= "mautic.page.config.form.tracking.landingpage.enabled=\"Enable on Mautic landing page\"";
    $track_b_replace_with= "mautic.page.config.form.tracking.landingpage.enabled=\"Enable on Landing page\"";
    replace_string_in_file($page_filename, $track_b_string_to_replace, $track_b_replace_with);
    
    $track_c_string_to_replace= "mautic.config.tab.pagetracking.info=\"Insert following code at the end of the web page before ending <code>&lt;/body&gt;</code> tag. Mautic Landing Pages are tracked automatically. Use this only to track 3rd party websites.\"";
    $track_c_replace_with= "mautic.config.tab.pagetracking.info=\"Insert following code at the end of the web page before ending <code>&lt;/body&gt;</code> tag.Landing Pages are tracked automatically. Use this only to track 3rd party websites.\"";
    replace_string_in_file($page_filename, $track_c_string_to_replace, $track_c_replace_with);
    
    
    $track_d_string_to_replace= "mautic.page.point.action.urlhit_descr=\"Change the contact's points after visiting a specific URL where Mautic tracking pixel is loaded.\"";
    $track_d_replace_with= "mautic.page.point.action.urlhit_descr=\"Change the contact's points after visiting a specific URL where Campact tracking pixel is loaded.\"";
    replace_string_in_file($page_filename, $track_d_string_to_replace, $track_d_replace_with);
    
    /*QUEUE BUNDLE CHANGES*/
    
    $queue_filename="../app/bundles/QueueBundle/Translations/en_US/messages.ini";
    
    /*queue settings*/
    
    $queue_string_to_replace= "mautic.queue.config.protocol.tooltip=\"This is an advanced setup allowing a work queue/message broker to process page hits and email tokens outside of the web request. The work queue/message broker must be configured and running outside of Mautic for this to function.\"";
    $queue_replace_with= "mautic.queue.config.protocol.tooltip=\"This is an advanced setup allowing a work queue/message broker to process page hits and email tokens outside of the web request. The work queue/message broker must be configured and running outside of Campact for this to function.\"";
    replace_string_in_file($queue_filename, $queue_string_to_replace, $queue_replace_with);
    
    system('rm -rf ../app/cache/*')
    ?>
    </body>
</html>