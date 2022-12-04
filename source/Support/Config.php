<?php

/**
 * DATABASE
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "mpe");

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "https://www.localhost/MeuPetEspecial");
define("CONF_URL_ADMIN", CONF_URL_BASE . "/admin");
define("CONF_URL_ERROR", CONF_URL_BASE . "/404");

/**
 * SITE
 */
define("CONF_SITE_NAME", "MeuPetEspecial");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "localhost/MesPetEspecial");

/**
 * SOCIAL
 */
/* define("CONF_SOCIAL_TWITTER_CREATOR", "@Brenofvs");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "@Brenofvs");
define("CONF_SOCIAL_FACEBOOK_APP", "626590460695980");
define("CONF_SOCIAL_FACEBOOK_PAGE", "Brenofvs");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "Brenofvs");
define("CONF_SOCIAL_GOOGLE_PAGE", "107305124528362639842");
define("CONF_SOCIAL_GOOGLE_AUTHOR", "103958419096641225872"); */

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * SESSION
 */
define("CONF_SES_PATH", __DIR__ . "/../../storage/sessions/");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * MESSAGE
 */
define("CONF_MESSAGE_CLASS", "trigger");
define("CONF_MESSAGE_INFO", "info");
define("CONF_MESSAGE_SUCCESS", "success");
define("CONF_MESSAGE_WARNING", "warning");
define("CONF_MESSAGE_ERROR", "error");

/**
 * VIEW
 */
/* define("CONF_VIEW_PATH", __DIR__ . "/../../assets/views");
define("CONF_VIEW_EXT", "php"); */

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "../storage/uploads");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
 * MAIL
 */
define("CONF_MAIL_HOST", "smtp.gmail.com");
define("CONF_MAIL_PORT", "587");
define("CONF_MAIL_USER", "brenofvs.consultoria@gmail.com");
define("CONF_MAIL_PASS", "aaaaaaaaaaaaaaaaaaaaaa");
define("CONF_MAIL_SENDER", ["name" => "Brenofvs", "address" => "brenofvs.consultoria@gmail.com"]);
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");
