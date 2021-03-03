<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-02-17 00:17:20 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-17 00:17:20 --> Query error: ERROR:  zero-length delimited identifier at or near """"
LINE 3: WHERE "user_email" = ""
                             ^ - Invalid query: SELECT *
FROM "article_user"
WHERE "user_email" = ""
ERROR - 2021-02-17 00:17:20 --> Severity: error --> Exception: Call to a member function row() on boolean /var/www/html/writerportal/application/core/MY_Model.php 81
ERROR - 2021-02-17 00:44:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" IS NULL
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-17 00:44:18 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" IS NULL
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 00:44:28 --> 404 Page Not Found: secure/user/edit/130
ERROR - 2021-02-17 00:44:30 --> 404 Page Not Found: secure/user/edit/130
ERROR - 2021-02-17 00:44:44 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 00:44:47 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-17 00:46:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 02:31:55 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-17 05:19:49 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-17 07:24:56 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-17 08:13:56 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-17 08:14:10 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 09:28:12 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-17 09:43:43 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 10:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 147
ERROR - 2021-02-17 10:55:07 --> Severity: Notice --> Undefined index: site_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 148
ERROR - 2021-02-17 10:55:07 --> Severity: Notice --> Undefined index: article_promo_channel /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 149
ERROR - 2021-02-17 10:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 153
ERROR - 2021-02-17 10:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 154
ERROR - 2021-02-17 16:22:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 16:30:15 --> 404 Page Not Found: Apple-touch-icon-precomposedpng/index
ERROR - 2021-02-17 16:30:15 --> 404 Page Not Found: Apple-touch-iconpng/index
ERROR - 2021-02-17 16:30:18 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 16:33:08 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 16:40:19 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 16:46:03 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 16:46:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 17:38:41 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-17 17:38:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 17:39:10 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-17 17:39:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 18:29:25 --> 404 Page Not Found: Assets/vendor
ERROR - 2021-02-17 18:29:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 18:32:28 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 18:33:09 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 18:38:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 18:38:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_site_id" = 'altametrics.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 18:38:17 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_site_id" = 'altametrics.com'
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 18:38:20 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 18:39:54 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 18:40:05 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 18:40:06 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_site_id" = 'altametrics.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 18:40:08 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_site_id" = 'altametrics.com'
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 18:57:48 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-17 19:30:00 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-17 19:38:08 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 19:40:43 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-17 19:40:47 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 19:45:20 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-17 19:45:22 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 19:45:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:07:52 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:09:37 --> 404 Page Not Found: S/index
ERROR - 2021-02-17 20:09:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:20:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:20:51 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-17 20:21:09 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:22:21 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:22:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-17 20:23:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:32:18 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:38:51 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:48:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:52:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:54:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:54:39 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-17 20:55:38 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:55:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:56:30 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:56:32 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-17 20:56:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:58:04 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 20:58:07 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-17 20:58:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 20
ERROR - 2021-02-17 20:58:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-17 20:58:54 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:01:47 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:03:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:04:40 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:05:09 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:07:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:08:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:11:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:13:38 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:15:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:15:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:15:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:16:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:18:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:25:20 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:25:52 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:26:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:34:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:34:46 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-17 21:34:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:37:40 --> 404 Page Not Found: Assets/vendor
ERROR - 2021-02-17 21:38:17 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:39:20 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:39:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:40:24 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:40:33 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:40:40 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-17 21:40:43 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 20
ERROR - 2021-02-17 21:40:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:41:05 --> 404 Page Not Found: Assets/vendor
ERROR - 2021-02-17 21:41:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:43:32 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:46:31 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:46:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:47:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:47:52 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:49:47 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 21:54:04 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 22:04:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 22:07:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 22:07:43 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 22:11:17 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 22:11:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-17 22:11:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 200
ERROR - 2021-02-17 22:11:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 190
ERROR - 2021-02-17 22:12:01 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 180
ERROR - 2021-02-17 22:14:29 --> Severity: error --> Exception: Too few arguments to function Articlemaster::get_permalink(), 2 passed in /var/www/html/writerportal/system/core/CodeIgniter.php on line 532 and exactly 3 expected /var/www/html/writerportal/application/controllers/Articlemaster.php 482
ERROR - 2021-02-17 22:20:34 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 22:24:01 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 22:36:05 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 22:49:37 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 22:59:42 --> 404 Page Not Found: Apple-touch-icon-precomposedpng/index
ERROR - 2021-02-17 22:59:42 --> 404 Page Not Found: Apple-touch-iconpng/index
ERROR - 2021-02-17 22:59:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:01:32 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:08:50 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-17 23:08:51 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:11:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:14:01 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:15:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:15:21 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:15:36 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:16:18 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:19:09 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:20:14 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:21:09 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:21:10 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:21:27 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:21:33 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_site_id" = 'zipinventory.com'
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:22:02 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:24:19 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:29:05 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:29:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_site_id" = 'zipinventory.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:29:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_site_id" = 'zipinventory.com'
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:32:34 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:33:20 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_site_id" = 'zipinventory.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:33:22 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_site_id" = 'zipinventory.com'
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:37:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:38:40 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_site_id" = 'zipinventory.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:38:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_site_id" = 'zipinventory.com'
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:42:51 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:43:13 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_site_id" = 'zipinventory.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:43:16 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_site_id" = 'zipinventory.com'
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:46:35 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 113
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:46:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:46:54 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:49:16 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-17 23:52:19 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
