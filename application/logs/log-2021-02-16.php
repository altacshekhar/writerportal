<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-02-16 00:11:54 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-16 00:55:06 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 147
ERROR - 2021-02-16 00:55:06 --> Severity: Notice --> Undefined index: site_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 148
ERROR - 2021-02-16 00:55:06 --> Severity: Notice --> Undefined index: article_promo_channel /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 149
ERROR - 2021-02-16 00:55:06 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 153
ERROR - 2021-02-16 00:55:06 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 154
ERROR - 2021-02-16 02:18:13 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-16 04:26:19 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-16 04:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 147
ERROR - 2021-02-16 04:55:07 --> Severity: Notice --> Undefined index: site_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 148
ERROR - 2021-02-16 04:55:07 --> Severity: Notice --> Undefined index: article_promo_channel /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 149
ERROR - 2021-02-16 04:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 153
ERROR - 2021-02-16 04:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 154
ERROR - 2021-02-16 06:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 147
ERROR - 2021-02-16 06:55:07 --> Severity: Notice --> Undefined index: site_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 148
ERROR - 2021-02-16 06:55:07 --> Severity: Notice --> Undefined index: article_promo_channel /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 149
ERROR - 2021-02-16 06:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 153
ERROR - 2021-02-16 06:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 154
ERROR - 2021-02-16 07:17:47 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-16 07:23:54 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-16 07:46:21 --> 404 Page Not Found: Javascript%3B/index
ERROR - 2021-02-16 07:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 147
ERROR - 2021-02-16 07:55:07 --> Severity: Notice --> Undefined index: site_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 148
ERROR - 2021-02-16 07:55:07 --> Severity: Notice --> Undefined index: article_promo_channel /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 149
ERROR - 2021-02-16 07:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 153
ERROR - 2021-02-16 07:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 154
ERROR - 2021-02-16 08:12:57 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-16 08:13:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 08:13:31 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-16 08:13:48 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 20
ERROR - 2021-02-16 08:13:55 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 08:47:09 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-16 08:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 147
ERROR - 2021-02-16 08:55:07 --> Severity: Notice --> Undefined index: site_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 148
ERROR - 2021-02-16 08:55:07 --> Severity: Notice --> Undefined index: article_promo_channel /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 149
ERROR - 2021-02-16 08:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 153
ERROR - 2021-02-16 08:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 154
ERROR - 2021-02-16 11:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 147
ERROR - 2021-02-16 11:55:07 --> Severity: Notice --> Undefined index: site_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 148
ERROR - 2021-02-16 11:55:07 --> Severity: Notice --> Undefined index: article_promo_channel /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 149
ERROR - 2021-02-16 11:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 153
ERROR - 2021-02-16 11:55:07 --> Severity: Notice --> Undefined index: article_promo_channel_social_id /var/www/html/writerportal/application/controllers/cron/Hootsuiteapicron.php 154
ERROR - 2021-02-16 13:47:40 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-16 14:59:08 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-16 16:32:33 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 16:32:38 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 16:33:25 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 124
AND "articles"."article_type" = 'pillar'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-16 16:36:26 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 16:36:32 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-16 16:36:33 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 16:36:39 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:11:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:11:58 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-16 17:12:02 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:32 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:40 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%l%'
OR article_user.user_email ILIKE '%l%'
OR article_user.user_fname ILIKE '%l%'
OR article_user.user_lname ILIKE '%l%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:40 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%li%'
OR article_user.user_email ILIKE '%li%'
OR article_user.user_fname ILIKE '%li%'
OR article_user.user_lname ILIKE '%li%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:40 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%lig%'
OR article_user.user_email ILIKE '%lig%'
OR article_user.user_fname ILIKE '%lig%'
OR article_user.user_lname ILIKE '%lig%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%ligh%'
OR article_user.user_email ILIKE '%ligh%'
OR article_user.user_fname ILIKE '%ligh%'
OR article_user.user_lname ILIKE '%ligh%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%light%'
OR article_user.user_email ILIKE '%light%'
OR article_user.user_fname ILIKE '%light%'
OR article_user.user_lname ILIKE '%light%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%lights%'
OR article_user.user_email ILIKE '%lights%'
OR article_user.user_fname ILIKE '%lights%'
OR article_user.user_lname ILIKE '%lights%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:42 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%lightsp%'
OR article_user.user_email ILIKE '%lightsp%'
OR article_user.user_fname ILIKE '%lightsp%'
OR article_user.user_lname ILIKE '%lightsp%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:43 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%lightspe%'
OR article_user.user_email ILIKE '%lightspe%'
OR article_user.user_fname ILIKE '%lightspe%'
OR article_user.user_lname ILIKE '%lightspe%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:43 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%lightspee%'
OR article_user.user_email ILIKE '%lightspee%'
OR article_user.user_fname ILIKE '%lightspee%'
OR article_user.user_lname ILIKE '%lightspee%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:43 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%lightspeed%'
OR article_user.user_email ILIKE '%lightspeed%'
OR article_user.user_fname ILIKE '%lightspeed%'
OR article_user.user_lname ILIKE '%lightspeed%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%lightspeed%'
OR article_user.user_email ILIKE '%lightspeed%'
OR article_user.user_fname ILIKE '%lightspeed%'
OR article_user.user_lname ILIKE '%lightspeed%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:45 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%lightspeed%'
OR article_user.user_email ILIKE '%lightspeed%'
OR article_user.user_fname ILIKE '%lightspeed%'
OR article_user.user_lname ILIKE '%lightspeed%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:21:53 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%lightspeed%'
OR article_user.user_email ILIKE '%lightspeed%'
OR article_user.user_fname ILIKE '%lightspeed%'
OR article_user.user_lname ILIKE '%lightspeed%'
 )
AND "articles_translate_i18"."article_site_id" = 'rmagazine.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:22:07 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%h%'
OR article_user.user_email ILIKE '%h%'
OR article_user.user_fname ILIKE '%h%'
OR article_user.user_lname ILIKE '%h%'
 )
AND "articles_translate_i18"."article_site_id" = 'rmagazine.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:22:08 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%ho%'
OR article_user.user_email ILIKE '%ho%'
OR article_user.user_fname ILIKE '%ho%'
OR article_user.user_lname ILIKE '%ho%'
 )
AND "articles_translate_i18"."article_site_id" = 'rmagazine.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:22:08 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%hos%'
OR article_user.user_email ILIKE '%hos%'
OR article_user.user_fname ILIKE '%hos%'
OR article_user.user_lname ILIKE '%hos%'
 )
AND "articles_translate_i18"."article_site_id" = 'rmagazine.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:22:09 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%host%'
OR article_user.user_email ILIKE '%host%'
OR article_user.user_fname ILIKE '%host%'
OR article_user.user_lname ILIKE '%host%'
 )
AND "articles_translate_i18"."article_site_id" = 'rmagazine.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:22:11 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%hostm%'
OR article_user.user_email ILIKE '%hostm%'
OR article_user.user_fname ILIKE '%hostm%'
OR article_user.user_lname ILIKE '%hostm%'
 )
AND "articles_translate_i18"."article_site_id" = 'rmagazine.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:22:12 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%hostme%'
OR article_user.user_email ILIKE '%hostme%'
OR article_user.user_fname ILIKE '%hostme%'
OR article_user.user_lname ILIKE '%hostme%'
 )
AND "articles_translate_i18"."article_site_id" = 'rmagazine.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:22:15 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%hostme%'
OR article_user.user_email ILIKE '%hostme%'
OR article_user.user_fname ILIKE '%hostme%'
OR article_user.user_lname ILIKE '%hostme%'
 )
AND "articles_translate_i18"."article_site_id" = 'rmagazine.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:22:34 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%hostme%'
OR article_user.user_email ILIKE '%hostme%'
OR article_user.user_fname ILIKE '%hostme%'
OR article_user.user_lname ILIKE '%hostme%'
 )
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:22:38 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND   (
articles_translate_i18.article_title ILIKE '%hostme%'
OR article_user.user_email ILIKE '%hostme%'
OR article_user.user_fname ILIKE '%hostme%'
OR article_user.user_lname ILIKE '%hostme%'
 )
AND "articles_translate_i18"."article_site_id" = 'rmagazine.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 17:22:40 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_site_id" = 'rmagazine.com'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 18:00:47 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-02-16 18:43:40 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 18:43:49 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10 OFFSET 10
ERROR - 2021-02-16 18:46:41 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 18:49:52 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 130
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 20:07:05 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 20:24:52 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
ERROR - 2021-02-16 23:17:38 --> last_query==
SELECT "articles_translate_i18".*, "article_user"."user_id", "article_user"."user_type", "article_user"."user_fname", "article_user"."user_lname", "article_user"."user_email", "article_user"."user_image", "articles"."article_type", "articles"."article_website", "articles"."article_published_website"
FROM "articles_translate_i18"
JOIN "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
JOIN "article_user" ON "article_user"."user_id" = "articles"."user_id"
WHERE "articles_translate_i18"."language_id" = 'en'
AND "article_user"."user_id" = 111
AND "articles_translate_i18"."article_status" != 'deleted'
ORDER BY "articles_translate_i18"."date_added" DESC
 LIMIT 10
